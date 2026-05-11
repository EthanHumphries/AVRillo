@props(['name'])

@error($name)
<p class="mt-4 text-sm text-red-500">{{ $message }}</p>
@enderror
