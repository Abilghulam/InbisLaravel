@props(['items' => []])

<nav class="breadcrumb-admin">
    @foreach ($items as $index => $item)
        @if (isset($item['url']) && $index < count($items) - 1)
            <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
            <span class="separator">›</span>
        @else
            <span class="current">{{ $item['label'] }}</span>
        @endif
    @endforeach
</nav>
