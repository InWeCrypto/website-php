$(function(){
	var lang = getQuery(location.search).lang;
	if(lang == "zh"){
		$("title").text("红包");
		$(".input-ct input").attr("placeholder","输入钱包地址，参与红包的领取");
		$(".input-ct label").text("领取");
		$(".li-1").text("打开InWeCrypto主页右上角“红包”按钮，");
		$(".li-2").html("点击扫一扫即可快速领取红包，<a href=\'http://inwecrypto.com/zh/platform\' target=\'_blank\'>即刻下载APP</a>抢到的几率更大哟～ ");
		$(".li-3").text("红包到账时间约为24-72H，请耐心等待");
		$(".p-text").text("扫描二维码打开红包");
	}else{
		$("title").text("Red Packet");
		$(".input-ct input").attr("placeholder","Enter your wallet address to get Red Packet");
		$(".input-ct label").text("Get");
		$(".li-1").text("Open Red Packet through the right corner on the InWeCrypto Home page. ");
		$(".li-2").html("Click scaning to quickly access Red Packet.<a href=\'http://inwecrypto.com/en/platform\' target=\'_blank\'>Download APP</a> ");
		$(".li-3").text("The processing time is 24-72H, please be patient.");
		$(".p-text").text("Scan the QR code to open the Red Packet");
	}
	var walletPt = (lang == "zh") ? "请输入正确的钱包地址" : "Please enter correct wallet address";
	
	var pth = location.pathname.split("/");
  var id = pth[pth.length-2];
  var addr = pth[pth.length-1];
  addr = (typeof addr == "string") ? addr.toLowerCase() : addr;
  
  $(".input-ct label").click(function(){
  	var signStatus = localStorage.getItem("signStatus") || "0";
  	var wallet = $(".input-ct input").val().trim();
  	$(".promote-txt").text("");
  	
  	wallet = wallet.replace(/^0x/,"");
  	if(wallet.length!=40){
  		return $(".promote-txt").text(walletPt);
  	}
  	wallet = "0x" + wallet.toLowerCase();
  	$(".input-ct .btn-mask").addClass("active");
  	$(".input-ct input").attr("disabled","disabled");
    $.post(baseUrl+"redbag/draw/"+id+"/"+addr, { 
			wallet_addr: wallet ,
			signStatus: signStatus,
			hash: md5("wallet_addr="+wallet+"&signStatus="+signStatus+"&id="+id)
		},function(data){
			$(".input-ct .btn-mask").removeClass("active");
			$(".input-ct input").removeAttr("disabled");
			if(data.code == 4000){
				$(".promote-txt").text((lang == "zh") ? "领取成功" : "Get Success!");
				localStorage.getItem("signStatus","1");
				setTimeout(function(){
					location.href = "rpRecord?id="+id+"&addr="+addr+"&wallet="+wallet+"&lang="+lang;
				},3000);
			}else{
				$(".promote-txt").text(data.msg);
			}
		});
  })
  
  
  function loading(){
  	setTimeout(function(){
  		$(".input-ct .btn-mask").removeClass("active");
			$(".input-ct input").removeAttr("disabled");
  		$(".promote-txt").text((lang == "zh")?"请求失败":"request was aborted");
  	},15000);
  }
  
})