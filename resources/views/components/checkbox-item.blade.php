@props([
    'id',
    'name',
    'label',
    'checked' => false,
    'value' => '1',
])

<div class="flex items-start gap-3 rounded-md p-3">
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="checkbox"
        value="{{ $value }}"
        @checked($checked)
        {{ $attributes->merge(['class' => 'ml-4 mt-1 h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500']) }}
    >
    <label class="text-sm text-slate-700" for="{{ $id }}">
        {{ $label }}
    </label>
</div>
