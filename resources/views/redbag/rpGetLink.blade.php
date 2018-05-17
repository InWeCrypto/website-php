<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>红包</title>
  <meta name="renderer" content="webkit" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="screen-orientation" content="portrait">
  <meta name="full-screen" content="yes">
  <meta name="browsermode" content="application">
  <meta name="x5-orientation" content="portrait">
  <meta name="x5-fullscreen" content="true">
  <meta name="x5-page-mode" content="app">
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />

  <meta name="keywords" content="红包" />
  <meta name="description" content="红包" />

  <!--  twitter -->
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:site" content="@inwecryptocom" />
  <meta property="twitter:title" content="红包" />
  <meta property="twitter:description" content="红包" />
  <meta property="twitter:url" content="" />
  <!-- End -->

  <!--  OpenGraph -->
  <meta property="fb:app_id" content="inwecryptocom" />
  <meta property="og:site_name" content="inwecrypto">
  <meta property="og:title" content="" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <meta property="og:description" content="红包" />
  <!-- End -->

  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="/assets/css/base.css?{{ $jss_version }}" />
  <link rel="stylesheet" href="/assets/css/rpGetLink.css?{{ $jss_version }}">
  <script type="text/javascript" src="/assets/js/jquery.min.js?{{ $jss_version }}"></script>
  <script type="text/javascript" src="/assets/js/util.js?{{ $jss_version }}"></script>
  <script type="text/javascript" src="/assets/js/md5.js?{{ $jss_version }}"></script>
  <script type="text/javascript" src="/assets/js/rpGetLink.js?{{ $jss_version }}"></script>
</head>

<body class="pace-done page-index">
	<div style="height: 0;width: 0;opacity: 0;overflow: hidden;">
		<img src="data:image/png;base64,{!! base64_encode(\QrCode::format('png')->size(250)->generate('Hello,LaravelAcademy!')) !!}" alt="微信预览图" />
	</div>
  <div class="content">
  	<div class="top-ct">
  		<h3><span>{{ $share_user }}</span></h3>
  		<p>{{ $share_msg }}</p>
  	</div>
  	<div class="center-ct">
  		<div class="box">
  			<img id="qrCode" alt="qrCode" src="data:image/png;base64,{!! base64_encode(\QrCode::format('png')->size(250)->generate($qr_text)) !!}"/>
  			<p class="p-text"></p>
  		</div>
  	</div>
  	<div class="ct">
  		<p class="promote-txt"></p>
  		<div class="input-ct">
  			<input type="text" placeholder="" />
  			<label class="get active"></label>
  			<label class="check"></label>
  			<span class="btn-mask">
  				<span class="loading"></span>
  			</span>
  		</div>
  		<ul>
  			<li class="li-1"></li>
  			<li class="li-2"> </li>
  			<li class="li-3"></li>
  		</ul>
  	</div>
  </div>
</body>
</html>
