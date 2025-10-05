@props([
    'title',
    'about_us' => null,
    'founders' => null,
    'galleries' => null,
    'brand_partners' => null,
    'retail_stores' => null,
    'customer_reviews' => null,
])


<!DOCTYPE html>
<html lang="id">

<head>
    <x-head>{{ $title }}</x-head>
</head>

<body>
    <x-navbar></x-navbar>
    <x-hero></x-hero>
    <x-about :about_us="$about_us"></x-about>
    <x-founder :founders="$founders"></x-founder>
    <x-gallery :galleries="$galleries"></x-gallery>
    <x-brand :brand_partners="$brand_partners"></x-brand>
    <x-product></x-product>
    <x-store :retail_stores="$retail_stores"></x-store>
    <x-modal></x-modal>
    <x-review :customer_reviews="$customer_reviews"></x-review>
    <x-company></x-company>
    <x-footer></x-footer>
    <x-foot></x-foot>
</body>

</html>
