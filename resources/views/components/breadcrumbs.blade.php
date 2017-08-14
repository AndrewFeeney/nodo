@if ($breadcrumbs)
    <ul>
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="is-active" aria-current="page">
                    <a href="#">
                        {{ $breadcrumb->title }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
@endif
