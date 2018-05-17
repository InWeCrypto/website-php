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
    	console.log(data)
			if(data.code == 4000){
				
			}else{
				
			}
		});
  
})