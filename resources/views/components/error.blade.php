@props(['name' => ''])

@error($name)
<h6 class="text-danger px-2 text-wrap fs-6 mb-0">{{ $message }}</h6>
@enderror
