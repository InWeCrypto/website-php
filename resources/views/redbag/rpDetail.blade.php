<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>领取红包的文本领取红包的文本</title>
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

  <meta name="keywords" content="标题标题标题" />
  <meta name="description" content="简介简介简介简介简介简介简介简介简介" />

  <!--  twitter -->
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:site" content="@inwecryptocom" />
  <meta property="twitter:title" content="标题标题标题" />
  <meta property="twitter:description" content="简介简介简介简介简介简介简介简介简介" />
  <meta property="twitter:url" content="文章图片路径文章图片路径文章图片路径" />
  <!-- End -->

  <!--  OpenGraph -->
  <meta property="fb:app_id" content="inwecryptocom" />
  <meta property="og:site_name" content="inwecrypto">
  <meta property="og:title" content="" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="文章网址文章网址文章网址文章网址" />
  <meta property="og:image" content="文章图片路径文章图片路径文章图片路径" />
  <meta property="og:description" content="简介简介简介简介简介简介简介简介简介" />
  <!-- End -->

  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="/assets/css/base.css" />
  <link rel="stylesheet" href="/assets/css/rpDetail.css">
  <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/assets/js/util.js"></script>
</head>

<body class="pc pace-done page-index">
	<div style="height: 0;width: 0;opacity: 0;overflow: hidden;">
		<img src="" alt="微信预览图" />
	</div>
  <div class="content {{ $share_type_class }}">
          <div id="iframe-ct" class="cont">
              <iframe src="{{ $share_attr }}"></iframe>
          </div>
          <div id="img-ct" class="cont ">
              <img class="img-view" src="{{ $share_attr }}" />
          </div>
          <div id="dom-ct" class="cont">

          </div>
  </div>
	<div class="rp-bg">
		<div class="rp-cont" >
			<h1>了开始就啊大灵放假撒浪蝶狂蜂</h1>
			<button>领红包</button>
		</div>
	</div>
  <script>
    $(function(){
        $(".rp-cont button").click(function(){
            if($(".content").hasClass("dom-ct")){
                window.open("{{ action('RedbagController@draw', ['id'=> $id,'redbag_addr'=> $redbag_addr]) }}");
            }else{
                location.href = "{{ action('RedbagController@draw', ['id'=> $id,'redbag_addr'=> $redbag_addr]) }}";
            }
        });
    });
  </script>

</body>
</html>
