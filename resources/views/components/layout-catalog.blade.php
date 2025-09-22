<!DOCTYPE html>
<html lang="en">

<head>
    <x-head-catalog />
</head>

<body>
    <x-navbar-catalog :type="$type" />
    <x-hero-catalog :type="$type" />
    <x-recommendation-catalog :recommendations="$recommendations" />
    <x-promo-catalog :promos="$promos" />
    <x-latest-catalog :latest="$latest" />
    <x-brand-catalog :type="$type" />
    <x-product-catalog :products="$products" />
    <x-footer-catalog />
    <x-modal-catalog />
    <x-foot-catalog />
</body>

</html>
