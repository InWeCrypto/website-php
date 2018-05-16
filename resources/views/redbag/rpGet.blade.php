<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title></title>
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
  <link rel="stylesheet" href="/assets/css/rpGet.css?{{ $jss_version }}">
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
  			<input type="text" placeholder="" />
  			<label></label>
  		</div>
  		<ul>
  			<li class="li-1"></li>
  			<li class="li-2"></li>
  			<li class="li-3"></li>
  		</ul>
  	</div>
  </div>
<script type="text/javascript">
$(function(){
	var lang = getQuery(location.search).lang;
	if(lang == "zh"){
		$("title").text("红包");
		$(".input-ct input").attr("placeholder","输入钱包地址，参与红包的领取");
		$(".input-ct label").text("领取");
		$(".li-1").text("打开InWeCrypto主页右上角“红包”按钮，");
		$(".li-2").text("点击扫一扫即可快速领取红包，抢到的几率更大哟～ ");
		$(".li-3").text("红包到账时间约为24-72H，请耐心等待");
	}else{
		$("title").text("Red Packet");
		$(".input-ct input").attr("placeholder","Enter your wallet address to get Red Packet");
		$(".input-ct label").text("Get");
		$(".li-1").text("Open Red Packet through the right corner on the InWeCrypto Home page. ");
		$(".li-2").text("Click scaning to quickly access Red Packet. ");
		$(".li-3").text("The processing time is 24-72H, please be patient.");
	}
	var walletPt = (lang == "zh") ? "请输入正确的钱包地址" : "Please enter correct wallet address";
	
	var pth = location.pathname.split("/");
  var id = pth[pth.length-2];
  var addr = pth[pth.length-1];
  addr = (typeof addr == "string") ? addr.toLowerCase() : addr;
  
  $(".input-ct label").click(function(){
  	$(".promote-txt").text("");
  	var signStatus = localStorage.getItem("signStatus") || "0";
  	var wallet = $(".input-ct input").val().trim();
  	if(!wallet)return false;
  	
  	wallet = wallet.replace(/^0x/,"");
  	if(wallet.length!=40){
  		return $(".promote-txt").text(walletPt);
  	}
  	wallet = "0x" + wallet;
  	
    $.post(baseUrl+"redbag/draw/"+id+"/"+addr, { 
			wallet_addr: wallet ,
			signStatus: signStatus,
			hash: md5("wallet_addr="+wallet+"&signStatus="+signStatus+"&id="+id)
		},function(data){
			//alert(data.msg);
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
