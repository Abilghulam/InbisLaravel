<!DOCTYPE html>
<html lang="en">

<head>
    <x-head-catalog />
</head>

<body>
    <x-navbar-catalog />
    <x-hero-catalog :type="$type" />
    <x-recommendation-catalog :type="$type" />
    <x-promo-catalog :type="$type" />
    <x-latest-catalog :type="$type" />
    <x-brand-catalog :type="$type" />
    <x-product-catalog :type="$type" />
    <x-modal-catalog />
    <x-footer-catalog />
    <x-foot-catalog />
</body>

</html>
