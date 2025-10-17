@props(['items' => []])

<nav class="breadcrumb-admin">
    @foreach ($breadcrumbs as $index => $crumb)
        @if (!empty($crumb['url']) && $index !== array_key_last($breadcrumbs))
            <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
            <span class="separator">›</span>
        @else
            <span class="current">{{ $crumb['label'] }}</span>
        @endif
    @endforeach
</nav>
