@props([
    'href' => null,
    'type' => 'button',
])

@if($href)
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => 'inline-flex items-center rounded-md border border-black bg-gray-50 px-4 py-2 text-sm font-semibold text-black shadow-sm transition hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400/40']) }}
    >
        {{ $slot }}
    </a>
@else
    <button
        type="{{ $type }}"
        {{ $attributes->merge(['class' => 'inline-flex items-center rounded-md border border-black bg-gray-50 px-4 py-2 text-sm font-semibold text-black shadow-sm transition hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400/40']) }}
    >
        {{ $slot }}
    </button>
@endif
