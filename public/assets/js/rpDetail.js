$(function(){
		var query = getQuery(location.search);
		if(query.lang == "zh"){
			$(".rp-cont button").text("领红包");
			$("title").text("红包");
			$(".rp-ct .zh").addClass("active");
		}else{
			$("title").text("Red Packet");
			$(".rp-cont button").text("Get Red Packet");
			$(".rp-ct .en").addClass("active");
		}

		//query.target = query.target||"draw2";
    $(".rp-bg").click(function(){
        if($(".content").hasClass("dom-ct")){
            window.open("{{ action('RedbagController@' . $target, ['id'=> $id,'redbag_addr'=> $redbag_addr, 'lang'=> $lang]) }}");
        }else{
            location.href = "{{ action('RedbagController@' . $target, ['id'=> $id,'redbag_addr'=> $redbag_addr, 'lang'=> $lang]) }}";
        }
    });
});