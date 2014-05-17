<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title or "HomeIntres"}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Open graph metadata -->
    <meta property="og:title" content="HomeIntres"/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:site_name" content="HomeIntres"/>
    <meta property="og:description" content="HomeIntres finds you a house based on your personal interests."/>
    <meta property="og:type" content="website"/>

    <!-- stylesheet -->
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">

    <!--[if lt IE 9]>
    <script src="{{URL::asset('js/plugins/html5shiv.js')}}"></script>
    <![endif]-->

</head>
<body>

<!-- Loader -->
<div id="loader">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
</div>

@yield('content')

<!-- disable logging -->
<script type="text/javascript">
    if(!window.console) window.console = {}; var methods = ["log", "debug", "warn", "info"]; for(var i=0;i<methods.length;i++){ console[methods[i]] = function(){};}
</script>

<!-- Requirejs -->
<script type="text/javascript" src="{{URL::asset('js/libs/jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/wow.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/masonry.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/functions.js')}}"></script>
<script data-main="js/main" src="{{URL::asset('js/plugins/require.js')}}"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-XXXXX-X', 'boilerplate.dev');
    ga('send', 'pageview');
</script>
</body>
</html>
