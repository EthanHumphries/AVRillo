@extends('layouts.app')

@section('title', 'SDLT Calculator')

@section('content')
    <section class="mx-auto max-w-3xl space-y-6">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">
                Stamp Duty Land Tax Calculator
            </h1>
            <p class="mt-2 text-sm text-slate-600 sm:text-base">
                Estimate SDLT for residential property purchases in England and Northern Ireland.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <x-form />
        </div>

        @if(isset($result))
            <x-result :result="$result" />
        @endif

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <x-rates />
        </div>
    </section>
@endsection
