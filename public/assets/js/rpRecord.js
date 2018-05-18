$(function(){
	var query = getQuery(location.search);
	var lang = query.lang;
	if(lang == "zh"){
		$("title").text("红包");
		$(".txt").text("红包将在24H内开奖，请留意相关钱包关注");
		$(".txt-name").text("领取数量");
		$(".txt-hj").text("合计：");
	}else{
		$("title").text("Red Packet");
		$(".txt").text("The Red Packet will be launched in 24H , Please keep watching the info of your wallet");
		$(".txt-name").text("Opened Packet Number");
		$(".txt-hj").text("Total：");
	}
	
  
  $.get(baseUrl+"redbag/send_record/"+query.id,function(redata){
		var data = redata.data;
		if(redata.code == 4000){
			var dom = $(".template li");
			var cont = $(".record-list");
			var total = parseFloat(0);
			
			$(".record-title .lt span:eq(1)").text(data.draws.length+"/"+data.redbag_number);
			$(".img-ct img").attr("src",data.gnt_category.icon);
			
			
			var codemap = {
				zh:{
					"4004": '钱包地址错误',
					"6003": '慢了一步，红包已经被抢完了...',
					"6002": "你已经成功领取了"+data.share_user+"的红包",
					"4000": "你已经成功领取了"+data.share_user+"的红包",
				},
				en:{
					"4004": 'wallet address Invalid ',
					"6003": 'The red packet has been brought out',
					"6002": "You have already opened the Packet "+data.share_user+"'s Red Packet",
					"4000": "You have already opened the Packet "+data.share_user+"'s Red Packet",
				}
			}
			
			
			if(query.status == "6002" || query.status == "4000"){
				$(".name").text(codemap[lang][query.status]);
				$(".box-2").show();
			}else if(query.status == "6003"){
				$(".name").text(codemap[lang][query.status]);
				$(".box-1").show();
			}else if(query.status == "4004"){
				$(".name").text(codemap[lang][query.status]);
				$(".box-1").show();
			}else{
				$(".box-1").show();
				$(".name").text(lang == "zh"?"领取失败":"Get Faile");
			}
			
			
			
			data.draws.forEach(function(item){
				var li = dom.clone(true);
				if(item.draw_addr.toLowerCase() == query.wallet){//筛选当前人的钱包地址
					li.addClass("cur");
				}
				li.find(".lt p").text(item.draw_addr);
				li.find(".lt span").text(getLocalTime(item.created_at));
				if(/-/.test(item.value)){//判断是否开奖 是否显示金额
					li.find(".rt").text("***"+data.gnt_category.name);
				}else{
					var num = parseInt(item.value,16)/Math.pow(10,data.gnt_category.decimals);
					console.log(num);
					total+=num;
					li.find(".rt").text(parseFloat(num).toFixed(4)+data.gnt_category.name);
				}
				cont.append(li);
			})
			
			if(total){
				$(".record-title .rt em").text(parseFloat(total).toFixed(4)+data.gnt_category.name);
			}else{
				$(".record-title .rt em").text("***"+data.gnt_category.name);
			}
			
		}else{
			
		}
	});
	
	
	if(query.status != "4006"){
		$.post(baseUrl+"redbag/draw_record",{
			wallet_addrs:[query.wallet]
		},function(redata){
			var info = {};
			redata.data.data.forEach(function(item){
				if(item.redbag.id == query.id){
					info = item;
				}
			})
			var data = info.redbag;
			if(redata.code == 4000){
				if(typeof data.gnt_category == "object"){
					if(/-/.test(info.value)){
						$(".num").text("***"+data.gnt_category.name)
					}else{
						$(".num").text(parseFloat(parseInt(info.value,16)/Math.pow(10,data.gnt_category.decimals)).toFixed(4)+data.gnt_category.name);
					}
				}
				$(".addr").text(data.redbag_addr);
			}else{
			
			}
		})
	}
  
})