<!DOCTYPE html>
<html lang="en">

<head>
    <x-head-catalog />
</head>

<body>
    <x-navbar-catalog :type="$type" />

    <main>
        {{ $slot }}
    </main>
    <x-modal-catalog />
    <x-foot-catalog />
</body>

</html>
