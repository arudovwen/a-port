<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="Front-End , Back-End Developer | Vue Js, React JS, Laravel Developer  | Full stack web developer">
    <meta name="keywords"
        content="HTML, CSS, Javascript, PHP , Vue Js, React JS, Laravel,Front-End , Back-End , Success Ahon, Arudovwen">
    <meta name="author" content="Success Ahon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="pVLtkNUP4oC5M8dielCfTI3QVNrCTUrctzdUsxyrmPg">
    <title>Success Ahon | Full Stack web developer</title>
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "LocalBusiness",
            "name": "Success Ahon | Software developer",
            "image": "https://arudovwen.me/images/cartoon.jpg",
            "telephone": "+2348160723910",
            "email": "successahon@gmail.com",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "Nigeria"
            },
            "url": "https://arudovwen.me/"
        }
    </script>

    @routes
    <script src="{{ mix('/js/manifest.js') }}" defer></script>
    <script src="{{ mix('/js/vendor.js') }}" defer></script>
    <script src="{{ mix('/js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased">
    @inertia

    @env('local')
    <script src="http://localhost:8080/js/bundle.js"></script>
    @endenv
    <script src="https://kit.fontawesome.com/51185f46ed.Js" defer></script>
</body>

</html>
