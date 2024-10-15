@props(['name' => ''])

@error($name)
<h6 class="text-danger p-2 text-wrap fs-6">{{ $message }}</h6>
@enderror
