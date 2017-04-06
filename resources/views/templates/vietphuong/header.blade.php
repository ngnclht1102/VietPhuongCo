<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>Việt Phương @yield('title')</title>
    
    <link rel="icon" href="{!!url('front-end/templates/vietphuong/images/favicon.png')!!}" />

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="description" content="Công ty Việt phương">
    <meta name="author" content="Nam Nguyen">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="{!!url('front-end/templates/vietphuong/css/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="{!!url('front-end/templates/vietphuong/css/font-awesome.min.css')!!}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,300,500,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{!!url('front-end/templates/vietphuong/css/animate.min.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!url('front-end/templates/vietphuong/components/owl-carousel/owl.carousel.css')!!}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{!!url('front-end/templates/vietphuong/components/owl-carousel/owl.transitions.css')!!}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{!!url('front-end/templates/vietphuong/components/mediaelement/mediaelementplayer.min.css')!!}" media="screen" />
    
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="{!!url('front-end/templates/vietphuong/components/magnific-popup/magnific-popup.css')!!}"> 

    <link rel="stylesheet" type="text/css" href="{!!url('front-end/templates/vietphuong/components/revolution_slider/css/settings.css')!!}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{!!url('front-end/templates/vietphuong/components/revolution_slider/css/style.css')!!}" media="screen" />
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="{!!url('front-end/templates/vietphuong/css/style.css')!!}">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{!!url('front-end/templates/vietphuong/css/custom.css')!!}">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="{!!url('front-end/templates/vietphuong/css/updates.css')!!}">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="{!!url('front-end/templates/vietphuong/css/responsive.css')!!}">
    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="{!!url('front-end/templates/vietphuong/css/ie.css')!!}" />
    <![endif]-->
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
<!-- start Mixpanel --><script type="text/javascript">(function(e,a){if(!a.__SV){var b=window;try{var c,l,i,j=b.location,g=j.hash;c=function(a,b){return(l=a.match(RegExp(b+"=([^&]*)")))?l[1]:null};g&&c(g,"state")&&(i=JSON.parse(decodeURIComponent(c(g,"state"))),"mpeditor"===i.action&&(b.sessionStorage.setItem("_mpcehash",g),history.replaceState(i.desiredHash||"",e.title,j.pathname+j.search)))}catch(m){}var k,h;window.mixpanel=a;a._i=[];a.init=function(b,c,f){function e(b,a){var c=a.split(".");2==c.length&&(b=b[c[0]],a=c[1]);b[a]=function(){b.push([a].concat(Array.prototype.slice.call(arguments,
0)))}}var d=a;"undefined"!==typeof f?d=a[f]=[]:f="mixpanel";d.people=d.people||[];d.toString=function(b){var a="mixpanel";"mixpanel"!==f&&(a+="."+f);b||(a+=" (stub)");return a};d.people.toString=function(){return d.toString(1)+".people (stub)"};k="disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config reset people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
for(h=0;h<k.length;h++)e(d,k[h]);a._i.push([b,c,f])};a.__SV=1.2;b=e.createElement("script");b.type="text/javascript";b.async=!0;b.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"file:"===e.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";c=e.getElementsByTagName("script")[0];c.parentNode.insertBefore(b,c)}})(document,window.mixpanel||[]);
mixpanel.init("85de2edf6b8a99adb5d2259a36246821");</script><!-- end Mixpanel -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96578430-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body>