@props(['active'=>'false'])

<div class="submenu {{ $active ? 'show' : 'collapse' }}" {{ $attributes }}>{{ $slot }}</div>
