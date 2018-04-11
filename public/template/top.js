var pathname = location.pathname.replace(/\/(zh|en)\//g, '');
if(pathname== '/newsdetail2' || pathname == '/newsdetail'){
    pathname = 'home';
}else{
    pathname = pathname + location.search;
}
document.writeln("<div class=\'navBox\'>");
document.writeln("  <div onClick='location.href=\"/zh/home\"' class=\'eleft\'>");
document.writeln("    <div class=\'logobox\'>");
document.writeln("      <img src=\'/assets/images/eicon1.png\' alt=\'\'>");
document.writeln("    </div>");
document.writeln("    <div class=\'logotextbox\'>");
document.writeln("			<img class=\'white\' src=\'/assets/images/eInWeCrypto-logo.png\' alt=\'\'>");
document.writeln("    	<img class=\'black\' src=\'/assets/images/logo_Navigationbar.png\' alt=\'\'>");
document.writeln("		</div>");
document.writeln("  </div>");
document.writeln("  ");
document.writeln("  <div class=\'eright mView\'>");
document.writeln("  	<span class=\'openMenu\'>");
document.writeln("<img class=\'white\' src=\'/assets/images/menu.png\' />");
document.writeln("  		<img class=\'black\' src=\'/assets/images/menu-black.png\' />");
document.writeln("  	</span>");
document.writeln("    <div class=\'sub\'>");
document.writeln("    	<span class=\'closeMenu\'>");
document.writeln("    		<img src=\'/assets/images/sub_close.png\'/>");
document.writeln("    	</span>");
document.writeln("    	<ul>");
document.writeln("    		<li class=\'index\'><a href=\'/zh/home\'>主页</a></li>");
document.writeln("    		<li class=\'home\'><a href=\'/zh/download\'>下载</a></li>");
document.writeln("    		<li><a href=\'/en/" + pathname + "\'>English</a></li>");
document.writeln("    		<li><a href=\'/zh/" + pathname + "\'>中文</a></li>");
document.writeln("    	</ul>");
document.writeln("    </div>");
document.writeln("  </div>");
document.writeln("  ");
document.writeln("  <div class=\'eright pcView\'>");
document.writeln("    <div class=\'index\' onClick=" + "location.href=" + "'/zh/home'>主页</div>");
document.writeln("    <div class=\'home\' onClick=" + "location.href=" + "'/zh/download'>下载</div>");
document.writeln("    <div class=\'langChange\'>语言");
document.writeln("      <span class=\'langBox\'>");
document.writeln("        <p onClick=" + "location.href=" + "'/en/" + pathname + "'>ENGLISH</p>");
document.writeln("        <p onClick=" + "location.href=" + "'/zh/" + pathname + "'>中文</p>");
document.writeln("      </span>");
document.writeln("    </div>");
document.writeln("  </div>");
document.writeln("</div>");
$(function(){
	var menuMap = {
        'home':'index',
        'download':'home',
        'platform':'home',
        'downios':'home'
    };
	Object.keys(menuMap).forEach(function(item){
		if(new RegExp(item).test(location.pathname)){
			$(".navBox ."+menuMap[item]).addClass("active");
		}
	})
})
