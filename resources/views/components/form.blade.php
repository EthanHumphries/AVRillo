<form method="POST" action="/" class="space-y-5" novalidate>
    @csrf

    <div>
        <label for="price" class="mb-2 block text-sm font-medium text-slate-700">Purchase Price (GBP)</label>
        <input
            type="number"
            step="1"
            min="0"
            class="block w-full rounded-md border border-slate-300 px-4 py-2 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
            id="price"
            name="price"
            value="{{ old('price', $price ?? '') }}"
            placeholder="e.g. 450000"
            required
        >
        <x-form-error name="price" />
    </div>

    <div class="grid gap-3 sm:grid-cols-2 mt-4">
        <x-form-header>Is this purchases freehold or leasehold?</x-form-header>

        <x-checkbox-item
            id="freehold_purchase"
            name="freehold_purchase"
            label="Freehold"
            :checked="old('freehold_purchase', $freehold_purchase ?? false)"
        />

        <x-checkbox-item
            id="leasehold_purchase"
            name="leasehold_purchase"
            label="Leasehold"
            :checked="old('leasehold_purchase', $leasehold_purchase ?? false)"
        />

        <div></div>

        <p class="text-xs text-gray-400 w-full">*Leasehold purchases are not implemented</p>

        <x-form-header>Please select any of the following which apply:</x-form-header>

        <x-checkbox-item
            id="first_time_buyer"
            name="first_time_buyer"
            label="First-time buyer"
            :checked="old('first_time_buyer', $first_time_buyer ?? false)"
        />

        <x-checkbox-item
            id="additional_property"
            name="additional_property"
            label="Additional property surcharge"
            :checked="old('additional_property', $additional_property ?? false)"
        />

        <div></div>

        <p class="text-xs text-gray-400 w-full">*Tick additional property surcharge if you will still own your current main residence on the day you complete your new purchase</p>

        <x-checkbox-item
            id="non_uk_resident"
            name="non_uk_resident"
            label="Are any of the purchasers a non-UK resident?"
            :checked="old('non_uk_resident', $non_uk_resident ?? false)"
        />

        <x-checkbox-item
            id="non_individual_purchase"
            name="non_individual_purchase"
            label="Is this a non-individual purchase?"
            :checked="old('non_individual_purchase', $non_individual_purchase ?? false)"
        />

        <div></div>

        <p class="text-xs text-gray-400 w-full">*Non-individual purchases are not implemented</p>
    </div>

    <div class="flex flex-wrap gap-3 pt-1 mt-4">
        <x-button type="submit">
            Calculate SDLT
        </x-button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const firstTimeBuyer = document.getElementById('first_time_buyer');
        const additionalProperty = document.getElementById('additional_property');

        const syncExclusiveCheckboxes = () => {
            firstTimeBuyer.disabled = additionalProperty.checked;
            additionalProperty.disabled = firstTimeBuyer.checked;
        };

        firstTimeBuyer.addEventListener('change', syncExclusiveCheckboxes);
        additionalProperty.addEventListener('change', syncExclusiveCheckboxes);

        syncExclusiveCheckboxes();
    });
</script>
