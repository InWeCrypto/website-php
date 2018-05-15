<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>APP下载</title>
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

  <meta name="keywords" content="APP下载" />
  <meta name="description" content="inWeCrypto APP下载" />

  <!--  twitter -->
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:site" content="@inwecryptocom" />
  <meta property="twitter:title" content="APP下载" />
  <meta property="twitter:description" content="inWeCrypto APP下载" />
  <meta property="twitter:url" content="" />
  <!-- End -->

  <!--  OpenGraph -->
  <meta property="fb:app_id" content="inwecryptocom" />
  <meta property="og:site_name" content="APP下载">
  <meta property="og:title" content="" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <meta property="og:description" content="inWeCrypto APP下载" />
  <!-- End -->

  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="/assets/css/base.css" />
  <link rel="stylesheet" href="/assets/css/downLoadApp.css">
  <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/assets/js/util.js"></script>
</head>

<body class="pace-done page-index">
	<div class="content">
		<div class="ios-ct">
			<p>1.使用苹果手机自带的 Safari 浏览器打开安装链接， 
点击安装到手机上。 （注：若微信内无法打开下载 
链接，请复制下载网址到浏览器打开，进行安装步骤）</p>
			<p>2.新下载APP的用户会出现提示框“未受信任的企业级 
开发者”。此时需要打开：手机自带的设置 -> 
通用 -> 设备管理 -> 选择应用 -> 点击信任。</p>
			<p>3.信任应用完毕后，打开App，就可以尽情体验了。</p>
		</div>
		<div class="btn-cont">
			<p><em>inwecrypto.com</em></p>
			<p>In Crypto We Trust.</p>
			<a class="btn ios" href="itms-services://?action=download-manifest&url=https://inwecrypto-china.oss-cn-shanghai.aliyuncs.com/manifest.plist">
				<img src="/assets/images/download-icon01.png" />下载APP
			</a>
			<a class="btn android" href="https://inwecrypto-china.oss-cn-shanghai.aliyuncs.com/inwecrypto.apk">
				<img src="/assets/images/download-icon02.png" />下载APP
			</a>
		</div>
	</div>
	<div class="mask"></div>

  <script>
	  var u = navigator.userAgent;
		var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;
		var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);

		$(function(){
			if(isiOS){
				$(".btn.ios").addClass("active");
				$(".ios-ct").show();
			}else{
				$(".btn.android").addClass("active");
			}
			if(isWeiXin()){
				$(".mask").show();
			}
		})

  </script>
</body>
</html>
