<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>helpcenter</title>
  <meta name="renderer" content="webkit" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="screen-orientation" content="portrait">
  <meta name="full-screen" content="yes">
  <meta name="browsermode" content="application">
  <meta name="x5-orientation" content="portrait">
  <meta name="x5-fullscreen" content="true">
  <meta name="x5-page-mode" content="app">
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />
  <meta name="keywords" content="inwecrypto"/>
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="/assets/css/base.css" />
  <link rel="stylesheet" href="/assets/css/helpcenter.css" />
  <script type="text/javascript" src="/assets/js/jquery.min.js" ></script>
  <script type="text/javascript" src="/assets/js/util.js" ></script>
</head>
<body class="pace-done mobile">
<script>
var bodyClass = document.querySelector("body").className;
if (IsTouchDevice) {
	document.querySelector("body").className = bodyClass+' mobile';
} else {
	document.querySelector("body").className = bodyClass+' pc';
}

indexRemFun();
remFun();
window.addEventListener("resize",function() {
    indexRemFun();
});
window.addEventListener("orientationchange", function(event) {
  if (window.orientation == 180 || window.orientation == 0) {
    var dw = document.body.clientWidth;
    setTimeout(() => {
        remFun();
    }, 100);
  }
  if (window.orientation == 90 || window.orientation == -90) {
    var dw = document.body.clientWidth;
    setTimeout(() => {
        remFun();
    }, 100);
  }
});
</script>
<div id="root">
  <div class="container">
  <div id="mainBox" class="anno ui" style="min-height: 667px;">
    <div id="helpcenter" class="annoBox ui f1">
      <div id="annoCon" class="annoCon ui f1">
        <div class="f1">
          <ul class="ui annoucmentListUl">
              @foreach($articles as $article)
              <li class="annoucmentListLi">
                <a href="/newsdetail2?art_id={{ $article['id'] }}">
                  <div class="liBox">
                    <p class="annoBoxLiText ellitext">{{ $article['title'] }}</p></div>
                </a>
              </li>
              @endforeach
          </ul>
        </div>
      </div>
      <div class="pagation-box m-hide" id="pagationBox">
        <ul class="ant-pagination " unselectable="unselectable">
          <li title="Previous Page" tabindex="0" class="ant-pagination-disabled ant-pagination-prev" aria-disabled="true">
            <a class="ant-pagination-item-link"></a>
          </li>
          <li title="1" class="ant-pagination-item ant-pagination-item-1 ant-pagination-item-active" tabindex="0">
            <a>1</a>
          </li>
          <li title="Next Page" tabindex="0" class="ant-pagination-disabled ant-pagination-next" aria-disabled="true">
            <a class="ant-pagination-item-link"></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div id="footerBox"></div>
	</div>
</div>


<script>


</script>
</body>
</html>
