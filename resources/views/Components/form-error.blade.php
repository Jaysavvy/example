@props(['name'])

@error($name)
    <p class="text-xs mt-1 text-red-500 font-semibold">{{ $message }}</p>
@enderror
