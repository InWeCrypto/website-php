var lang = /en\//.test(location.pathname) ? "en" : "zh";
document.writeln("<div class=\'contactBox\' id=\'contactBox\'>");
document.writeln("      <img class=\'logo\' src=\'/assets/images/eicon1.png\' />");
document.writeln("      <div class=\'footerText \'>©InWeCrypto 2018</div>");
if(lang=="zh"){
	document.writeln(" <a class=\'user-aggre\' href=\'/userAgreement.html\'>用户协议</a>");
}else{
	document.writeln(" <a class=\'user-aggre\' href=\'/userAgreement.html\'>user protocol</a>");
}
document.writeln("      <div class=\'ct\'>");
document.writeln("      	<ul class=\'iconBox\'>");
/*document.writeln("      	  <li class=\'airportIcon\'>");
document.writeln("      	      WeChat <img class=\'airportQrcode\' src=\'/assets/images/commendus.jpeg\' alt=\'\'>");
document.writeln("      	  </li>");*/
document.writeln("      	  <li>");
document.writeln("      	    <a href=\'mailto:support@inwecrypto.com\'>");
document.writeln("      	      Email");
document.writeln("      	    </a>");
document.writeln("      	  </li>");
document.writeln("      	  <li>");
document.writeln("      	    <a href=\'https://t.me/inwe_crypto\'>");
document.writeln("      	      Telegram");
document.writeln("      	    </a>");
document.writeln("      	  </li>");
document.writeln("      	  <li class=\'airportIcon\'>");
document.writeln("      	    <a href=\'https://twitter.com/inwe_crypto\'>Twitter</a>");
document.writeln("      	  <li>");
document.writeln("      	    <a href=\'https://medium.com/@inwecrypto\'>");
document.writeln("      	      Medium");
document.writeln("      	    </a>");
document.writeln("      	  </li>");
document.writeln("      	  <li>");
document.writeln("      	    <a href=\'https://discord.gg/afbXyfX\'>");
document.writeln("      	      Discord");
document.writeln("      	    </a>");
document.writeln("      	  </li>");
document.writeln("      	</ul>");
document.writeln("      </div>");
document.writeln("    </div>");
