$(function(){
	var lang = getQuery(location.search).lang;
	if(lang == "zh"){
		$("body").attr("style","background: #f04237 url(/assets/images/rpbg-4-zh.jpg) no-repeat center top / 100% 100%;");
		$("title").text("红包");
		$(".input-ct input").attr("placeholder","输入ETH地址抢红包");
		$(".input-ct label").text("领取");
		$(".input-ct label.get").text("领取");
		$(".input-ct label.check").text("查看");
		$(".li-1").text("打开InWeCrypto主页右上角“红包”按钮，");
		$(".li-2").html("点击扫一扫即可快速领取红包，<a href=\'http://inwecrypto.com/zh/platform\' target=\'_blank\'>即刻下载APP</a>抢到的几率更大哟～ ");
		$(".li-3").text("红包到账时间约为24-72H，请耐心等待");
		$(".p-text").text("扫描二维码打开红包获取"+getQuery(location.search).symbol);
	}else{
		$("title").text("Red Packet");
		$(".input-ct input").attr("placeholder","Enter your ETH wallet address to get Red Packet");
		$(".input-ct label").text("Get");
		$(".input-ct label.get").text("Get");
		$(".input-ct label.check").text("Record");
		$(".li-1").text("Open Red Packet through the right corner on the InWeCrypto Home page. ");
		$(".li-2").html("Click scaning to quickly access Red Packet.<a href=\'http://inwecrypto.com/en/platform\' target=\'_blank\'>Download APP</a> ");
		$(".li-3").text("The processing time is 24-72H, please be patient.");
		$(".p-text").text("Scan the QR Code in InWe app and get "+getQuery(location.search).symbol);
	}
	var walletPt = (lang == "zh") ? "请输入正确的钱包地址" : "Please enter correct wallet address";
	
	var pth = location.pathname.split("/");
  var id = pth[pth.length-2];
  var addr = pth[pth.length-1];
  addr = (typeof addr == "string") ? addr.toLowerCase() : addr;
  
  
  if(localStorage.getItem("id-"+id)){//如果已经领取过的终端
  	$(".input-ct .get").removeClass("active");
  	$(".input-ct .check").addClass("active").click(function(){
  		var wallet = $(".input-ct input").val().trim();
	  	wallet = wallet.replace(/^0x/,"");
	  	if(wallet.length!=40){
	  		return $(".promote-txt").text(walletPt);
	  	}
	  	wallet = "0x" + wallet.toLowerCase();
	  	location.href = "/redbag/rpRecord?id="+id+"&addr="+addr+"&wallet="+wallet+"&lang="+lang+"&status=6002";
  	});
  }
  
  
  
  $(".input-ct label").click(function(){
  	var signStatus = localStorage.getItem("id-"+id) || "0";
  	var wallet = $(".input-ct input").val().trim();
  	$(".promote-txt").text("");
  	
  	/*wallet = wallet.replace(/^0x/,"");
  	if(wallet.length!=40){
  		return $(".promote-txt").text(walletPt);
  	}
  	wallet = "0x" + wallet.toLowerCase();*/
  	wallet = wallet.toLowerCase();
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
				localStorage.setItem("id-"+id,"1");
				setTimeout(function(){
					location.href = "/redbag/rpRecord?id="+id+"&addr="+addr+"&wallet="+wallet+"&lang="+lang+"&status="+data.code;
				},3000);
				$(".input-ct .get").removeClass("active");
  			$(".input-ct .check").addClass("active");
			}else{
				$(".promote-txt").text(data.msg);
				setTimeout(function(){
					location.href = "/redbag/rpRecord?id="+id+"&addr="+addr+"&wallet="+wallet+"&lang="+lang+"&status="+data.code;
				},3000);
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