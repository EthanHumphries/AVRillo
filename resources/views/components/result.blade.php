<div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <h2 class="text-lg font-semibold text-slate-900">Estimated SDLT</h2>

    <div class="mt-4 flex items-baseline justify-between border-b border-slate-200 pb-4">
        <span class="text-sm text-slate-600">Total tax</span>
        <strong class="text-2xl font-semibold text-slate-900">GBP {{ number_format($result['total_tax'] ?? 0, 2) }}</strong>
    </div>

    <div class="mt-3 flex items-center justify-between text-sm">
        <span class="text-slate-600">Effective tax rate</span>
        <span class="font-medium text-slate-800">{{ number_format($result['effective_rate'] ?? 0, 2) }}%</span>
    </div>

    @if(!empty($result['bands']))
        <div class="mt-5">
            <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-500">
                Breakdown by band
            </h3>
            <ul class="mt-3 divide-y divide-slate-200">
                @foreach($result['bands'] as $band)
                    <li class="flex items-start justify-between gap-3 py-3">
                        <span class="text-sm text-slate-700">
                            GBP {{ number_format($band['from']) }} - GBP {{ number_format($band['to']) }}
                            <span class="block text-xs text-slate-500">{{ $band['rate'] }}%</span>
                        </span>
                        <strong class="text-sm font-semibold text-slate-900">
                            GBP {{ number_format($band['tax'], 2) }}
                        </strong>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <p class="mt-4 text-xs text-slate-500">
        This is an estimate only. Confirm final SDLT with HMRC guidance or a conveyancer.
    </p>
</div>
