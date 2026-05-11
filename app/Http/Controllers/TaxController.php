<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index() {
        return view('index');
    }

    public function create() {
        //
    }

    public function show() {
        $validated = request()->validate([
            'price' => ['required', 'numeric', 'min:0'],
            'first_time_buyer' => ['nullable', 'boolean'],
            'additional_property' => ['nullable', 'boolean'],
            'non_uk_resident' => ['nullable', 'boolean'],
        ]);

        $price = (float) $validated['price'];
        $firstTimeBuyer = request()->boolean('first_time_buyer');
        $additionalProperty = request()->boolean('additional_property');
        $nonUkResident = request()->boolean('non_uk_resident');

        $bandType = match (true) {
            $additionalProperty => 'additional_property',
            $firstTimeBuyer && $price <= 500000 => 'first_time_buyer',
            default => 'standard',
        };

        $bandsJson = file_get_contents(storage_path('../resources/TaxRateConfigurations.json'));
        $allBands = json_decode($bandsJson, true, flags: JSON_THROW_ON_ERROR);
        $bands = $allBands[$bandType];

        if ($nonUkResident) {
            $bands = array_map(function (array $band): array {
                $band['rate'] += 2;

                return $band;
            }, $bands);
        }

        $totalTax = 0;
        $breakdown = [];

        foreach ($bands as $band) {
            if ($price <= $band['from']) {
                continue;
            }

            $bandTo = $band['to'] ?? $price;
            $taxableAmount = min($price, $bandTo) - $band['from'];

            if ($taxableAmount <= 0) {
                continue;
            }

            $tax = $taxableAmount * ($band['rate'] / 100);
            $totalTax += $tax;

            $breakdown[] = [
                'from' => $band['from'],
                'to' => min($price, $bandTo),
                'rate' => $band['rate'],
                'tax' => $tax,
            ];
        }

        return view('index', [
            'price' => $price,
            'first_time_buyer' => $firstTimeBuyer,
            'additional_property' => $additionalProperty,
            'non_uk_resident' => $nonUkResident,
            'result' => [
                'total_tax' => $totalTax,
                'effective_rate' => $price > 0 ? ($totalTax / $price) * 100 : 0,
                'bands' => $breakdown,
            ],
        ]);
    }

    public function store() {
        //
    }

    public function edit() {
        //
    }

    public function update() {
        //
    }

    public function destroy() {
        //
    }
}
