<?php
/***
 *-----------------------------------------------------
 * Master Header Blade Template for includes
 *-----------------------------------------------------
 * Filename: master.blade.php
 * Created: 10 March 2015 10:30 PM
 * Updated: 16 March 2015 11:00 PM
 *
 * Purpose:  Reuse HTML template as an include to existing master templates
 * Notes:
 *
 * Author: Simon Assouline
 * Copyright: 2015 SIACOM ©, All rights reserved.
 */
?>
<!doctype html>
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title or 'Sons of Anarchy' }}</title>

    <!-- Styles Note: Elixir will fill in the version number-->
    <!-- This prevents cache problems so that the filename will  -->
    <!-- Always be different after you run gulp or "gulp watch" -->
    <link rel="stylesheet" href="{{ elixir("css/styles.css") }}">
    @yield('styles')

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    <script src="{{ elixir("js/scripts.js") }}"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/ui-bootstrap.min.js"></script>
    @yield('scripts')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
