<!DOCTYPE html>
<html lang="{{trans('author.lang')}}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="dirassa"/>
    <meta name="author" content="dirassa"/>

    <title>@if(!empty($title)) {{$title}} @endif</title>
    <!--Import materialize.css-->
    <link rel="icon" type="image/ico" href="{{ASSET}}/images/favicon_icon.png"/>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.1.2/css/material-design-iconic-font.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ASSET}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/3.6.0/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="{{ASSET}}/css/jquery.steps.css">
   <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <!-- Default Theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--[if lt IE 9]>
      <script async src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ASSET}}/js/jquery.js"></script>
  </head>

  <body class="animsition" data-animsition-in="zoom-in-sm" data-animsition-in-duration="1000" data-animsition-out="zoom-out-sm" data-animsition-out-duration="800">
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>