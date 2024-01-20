<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $setting->title }} - {{ $setting->desc }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="{{asset("$setting->icon")}}" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="{{asset("website/assets")}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("website/assets")}}/css/iconfont.min.css">
    <link rel="stylesheet" href="{{asset("website/assets")}}/css/plugins.css">
    <link rel="stylesheet" href="{{asset("website/assets")}}/css/helper.css">
    <link rel="stylesheet" href="{{asset("website/assets")}}/css/style.css">
        <!-- Icons -->
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/boxicons.css" />
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/flag-icons.css" />
    <!-- Modernizr JS -->
    <script src="{{asset("website")}}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body @if(Config::get('app.locale') == "ar") data-rtl="rtl" @endif >
