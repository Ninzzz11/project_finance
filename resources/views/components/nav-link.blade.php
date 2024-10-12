@props(['active' => false])

 <a class="{{ $active ? 'nav-link active' : 'nav-link'}} " {{ $attributes }}
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}
    <span class="badge badge-success">6</span></a>
