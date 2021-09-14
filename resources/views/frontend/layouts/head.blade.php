<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Dshop. @yield('title')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('frontend/img/logooooo-01.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('frontend/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('frontend/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('frontend/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('frontend/img/apple-touch-icon-144x144-precomposed.png') }}">
	
    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('frontend/css/bootstrap.custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

    @yield('styles')

</head>