/*var data = {
    "id": 7,
    "auth_tx_id": "transaction_data",
    "redbag_tx_id": "",
    "redbag_id": 0,
    "redbag": "40",
    "redbag_symbol": "ZIL",
    "redbag_addr": "0x21cD879e7b7fE6de1225B431E782C40b72441Be0",
    "redbag_number": 10,
    "fee": "0.01",
    "fee_addr": "0x21cD879e7b7fE6de1225B431E782C40b72441Be0",
    "share_type": 3,
    "share_attr": "https://www.baidu.com",
    "share_user": "what",
    "share_msg": "大吉大利, 今晚吃鸡",
    "created_at": "2018-04-24 09:45:26",
    "updated_at": "2018-04-24 10:14:27",
    "share_theme_url": "",
    "fee_tx_id": "",
    "done": 0,  // 红包是否开奖1.已开奖(领取中),0.待开奖,2.开奖结束
    "auth_block": 0, // 授权块高
    "redbag_block": 0, // 红包块高
    "fee_block": 0, // 手续费块高
    "redbag_back_block": 0, // 红包退回块高
    "redbag_back": "", // 红包退回金额
    "redbag_back_tx_id": "", // 红包退回tx_id
    "status": 2, // 红包状态,1.完成,2.礼金打包,3.红包创建中,4.领取中,-2.礼金打包失败(授权失败),-3.红包创建失败, -202 礼包授权pending中, -303.红包创建pending中
    "draw_redbag_number": 0, // 红包已领取个数
    "auth_at": "2018-04-26 02:39:04", // 授权时间
    "redbag_at": "", // 创建红包时间
    "redbag_back_at": "", // 红包退回时间
    "redbag_back_tx_status": 0, // 红包退回状态, 1.打开成功,-1打开失败
    "redbag_back_number":0 , // 红包退回数量
    "gnt_category": {
        "name": "ZIL",
        "icon": "",
        "address": "0x58a6545daec46dcec0e861e5edaa6fad997e69bb",
        "gas": 0,
        "decimals": 12
    },
    "draws": [
        {
            "id": 6,
            "redbag_id": "994052287116611584", // 红包ID
            "redbag_addr": "0x96973005c14d98d4e48aba0124537ccb6b5975b0", // 领取红包地址
            "draw_addr": "0x96973005c14d98d4e48aba0124537ccb6b5975b0", // 领取钱包地址
            "created_at": "2018-05-09 06:58:33", // 领取时间
            "updated_at": "2018-05-09 06:58:33",
            "tx_id": "", // 领取订单
            "value": "-", // 领取金额
            "tx_status": 0, // 领取状态,-1.领取失败,1.领取成功
            "tx_block": 0, // 领取块高
        }
    ]
}*/

$(function(){
	var query = getQuery(location.search);
	var lang = query.lang;
	if(lang == "zh"){
		$("title").text("红包");
	}else{
		$("title").text("Red Packet");
	}
	
	
	console.log(query);
  
    $.get(baseUrl+"/redbag/send_record/"+query.id,function(data){
    	console.log('111',data)
			if(data.code == 4000){
				var dom = $("template li");
				var cont = $(".record-list");
				data.draws.forEach(function(item){
					var li = dom.clone(true);
					if(item.draw_addr.toLowerCase() == query.addr){
						li.addClass("cur");
					}
					li.find(".lt p").text(item.draw_addr);
					li.find(".lt span").text(item.created_at);
					li.find(".rt").text(parseInt(item.value,16)/Math.pow(10,data.gnt_category.decimals));
					$(cont).append(li);
				})
				
			}else{
				
			}
		});
		$.post(baseUrl+"/redbag/draw_record",{
			wallet_addrs:[query.addr]
		},function(redata){
			console.log('222',data)
			var data = redata.data[0].redbag;
			if(data.code == 4000){
				if(typeof data.gnt_category == "object"){
					$(".img-ct img").attr("src",data.gnt_category.icon);
					$(".num").text(parseInt(data.redbag,16)/Math.pow(10,data.gnt_category.decimals));
				}
				$(".name").text("你已经成功领取了"+data.share_user+"的红包");
				$(".addr").text(data.redbag_addr);
			}else{
				
			}
		})
  
})