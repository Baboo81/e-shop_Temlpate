<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $meta['description'] ?? $metaDesc ?? '' }}">
    <meta name="keywords" content="{{ $meta['keywords'] ?? $metaKeyWords ?? '' }}">
<!-- Google Tag Manager -->
<script>
    (function(w,d,s,l,i){
        w[l]=w[l]||[];
        w[l].push({'gtm.start': new Date().getTime(), event:'gtm.js'});
        var f=d.getElementsByTagName(s)[0], j=d.createElement(s), dl=l!='dataLayer'?'&l='+l:'';
        j.async=true;
        j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
        f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PXTDTSDJ');
</script>
<!-- End Google Tag Manager -->

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('assets/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/aos/aos.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" crossorigin="" />

<!-- Styles spécifiques à une page -->
@yield('styles')

<title>{{ $pageTitle ?? '' }}</title>
```

</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXTDTSDJ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

```
<!-- JS Libraries -->
<script src="{{ asset('assets/js/jquery.min.js') }}" defer></script>
<script src="{{ asset('assets/js/popper.js') }}" defer></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('assets/libs/aos/aos.js') }}" defer></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" crossorigin="" defer></script>
<script src="{{ asset('assets/js/main.js') }}" defer></script>
```

</body>
</html>
