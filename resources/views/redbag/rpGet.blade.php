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
  <link rel="stylesheet" href="/assets/css/rpGet.css">
  <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/assets/js/util.js"></script>
  <script type="text/javascript" src="/assets/js/md5.js"></script>
</head>

<body class="pace-done page-index">
	<div style="height: 0;width: 0;opacity: 0;overflow: hidden;">
		<img src="data:image/png;base64,{!! base64_encode(\QrCode::format('png')->size(250)->generate($qr_text)) !!}" alt="微信预览图" />
	</div>
  <div class="content">
  	<img id="qrCode" alt="qrCode" src="data:image/png;base64,{!! base64_encode(\QrCode::format('png')->size(250)->generate($qr_text)) !!}"/>
  	<div class="ct">
  		<p class="promote-txt"></p>
  		<div class="input-ct">
  			<input type="text" placeholder="输入钱包地址，参与红包的领取" />
  			<label>领取</label>
  		</div>
  		<ul>
  			<li>打开InWeCrypto主页右上角“红包”按钮，</li>
  			<li>点击扫一扫即可快速领取红包，抢到的几率更大哟～ </li>
  			<li>红包到账时间约为24-72H，请耐心等待</li>
  		</ul>
  	</div>
  </div>
<script type="text/javascript">
$(function(){
	
	var pth = location.pathname.split("/");
  var id = pth[pth.length-2];
  var addr = pth[pth.length-1];
  
  $(".input-ct label").click(function(){
  	$(".promote-txt").text("");
  	var signStatus = localStorage.getItem("signStatus") || "0";
  	var wallet = $(".input-ct input").val().trim();
  	if(!wallet)return false;
    $.post(baseUrl+"redbag/draw/"+id+"/"+addr, { 
			wallet_addr: wallet ,
			signStatus: signStatus,
			hash: md5("wallet_addr="+wallet+"&signStatus="+signStatus+"&id="+id)
		},function(data){
			alert(data.msg);
			if(data.code == 4000){
				localStorage.getItem("signStatus","1");
			}else{
				$(".promote-txt").text(data.msg);
			}
		});
  })
  
})
</script>
</body>
</html>
