$(function(){
		var query = getQuery(location.search);
		if(query.lang == "zh"){
			$(".rp-cont button").text("领红包");
			$("title").text("红包");
			$(".rp-ct .zh").addClass("active");
			$(".rp-bg .zh").show();
		}else{
			$("title").text("Red Packet");
			$(".rp-cont button").text("Get Red Packet");
			$(".rp-ct .en").addClass("active");
			$(".rp-bg .en").show();
		}

		//query.target = query.target||"draw2";
    $(".rp-bg").click(function(){
    	var urlTarget = $("#urlTarget").text().trim();
      if($(".content").hasClass("dom-ct")){
          window.open(urlTarget);
      }else{
          location.href = urlTarget;
      }
    });
});