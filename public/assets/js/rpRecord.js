$(function(){
	var query = getQuery(location.search);
	var lang = query.lang;
	if(lang == "zh"){
		$("title").text("红包");
	}else{
		$("title").text("Red Packet");
	}
	
  
  $.get(baseUrl+"redbag/send_record/"+query.id,function(redata){
  	console.log('111',redata)
		var data = redata.data;
		if(redata.code == 4000){
			var dom = $(".template li");
			var cont = $(".record-list");
			var total = parseFloat(0);
			
			$(".record-title .lt span").text(data.draws.length+"/"+data.redbag_number);
			
			data.draws.forEach(function(item){
				var li = dom.clone(true);
				if(item.draw_addr.toLowerCase() == query.addr){
					li.addClass("cur");
				}
				li.find(".lt p").text(item.draw_addr);
				li.find(".lt span").text(item.created_at);
				if(/-/.test(item.value)){
					li.find(".rt").text("???"+data.gnt_category.name);
				}else{
					var num = parseInt(item.value,16)/Math.pow(10,data.gnt_category.decimals);
					console.log(num);
					total+=num;
					li.find(".rt").text(num+data.gnt_category.name);
				}
				cont.append(li);
			})
			
			if(total){
				$(".record-title .rt em").text(total+data.gnt_category.name);
			}else{
				$(".record-title .rt em").text("???"+data.gnt_category.name);
			}
			
		}else{
			
		}
	});
	$.post(baseUrl+"redbag/draw_record",{
		wallet_addrs:[query.addr]
	},function(redata){
		var info = {};
		redata.data.data.forEach(function(item){
			if(item.redbag_addr.toLowerCase() == query.addr.toLowerCase()){
				info = item;
			}
		})
		var data = info.redbag;
		console.log('222',data)
		if(redata.code == 4000){
			if(typeof data.gnt_category == "object"){
				$(".img-ct img").attr("src",data.gnt_category.icon);
				if(/-/.test(info.value)){
					$(".num").text("???"+data.gnt_category.name)
				}else{
					$(".num").text(parseInt(info.value,16)/Math.pow(10,data.gnt_category.decimals)+data.gnt_category.name);
				}
			}
			$(".name").text("你已经成功领取了"+data.share_user+"的红包");
			$(".addr").text(data.redbag_addr);
		}else{
			
		}
	})
  
})