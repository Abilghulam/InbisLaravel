@props([
    'type',
    'heroes' => collect(),
    'recommendations' => collect(),
    'promos' => collect(),
    'latest' => collect(),
    'products' => collect(),
    'promo_title' => null,
    'brands' => collect(),
])
<!DOCTYPE html>
<html lang="en">

<head>
    <x-head-catalog />
</head>

<body>
    <x-navbar-catalog :type="$type" />

    {{--  Hero Section Dinamis --}}
    <x-hero-catalog :type="$type" :heroes="$heroes" />

    {{-- Section Lainnya --}}
    <x-recommendation-catalog :recommendations="$recommendations" />
    <x-promo-catalog :promos="$promos" :promo_title="$promo_title" />
    <x-latest-catalog :latest="$latest" />
    {{--  Brand Section Dinamis --}}
    <x-brand-catalog :type="$type" :brands="$brands" />
    <x-product-catalog :products="$products" />

    {{-- Footer & Scripts --}}
    <x-footer-catalog />
    <x-modal-catalog />
    <x-foot-catalog />
</body>

</html>
