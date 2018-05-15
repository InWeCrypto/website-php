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
  <link rel="stylesheet" href="/assets/css/rpDetail.css?{{ $jss_version }}">
  <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/assets/js/util.js"></script>
</head>

<body class="pace-done page-index content {{ $share_type_class }}">
  <!--<div>-->
          <div id="iframe-ct" class="cont">
              <iframe src="{{ $share_attr }}"></iframe>
          </div>
          <div id="img-ct" class="cont ">
              <img class="img-view" src="{{ $share_attr }}" />
          </div>
          <div id="dom-ct" class="cont">

          </div>
 <!-- </div>-->
	<div class="rp-bg">
		<div class="rp-cont" >
			<h1>{{ $share_msg }}</h1>
			<button>领红包</button>
		</div>
	</div>
  <script>
    $(function(){
        $(".rp-cont button").click(function(){
            if($(".content").hasClass("dom-ct")){
                window.open("{{ action('RedbagController@' . $target, ['id'=> $id,'redbag_addr'=> $redbag_addr, 'lang'=> $lang]) }}");
            }else{
                location.href = "{{ action('RedbagController@' . $target, ['id'=> $id,'redbag_addr'=> $redbag_addr, 'lang'=> $lang]) }}";
            }
        });
    });
  </script>

</body>
</html>
