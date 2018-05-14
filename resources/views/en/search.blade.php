<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  	<title>InWeCrypto-Community</title>
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
  	<meta name="description" content="">
  	<!--  twitter -->
  	<meta property="twitter:card" content="summary" />
  	<meta property="twitter:site" content="@inwecryptocom" />
  	<meta property="twitter:title" content="InWeCrypto-Community" />
  	<meta property="twitter:description" content="InWe-Community" />
  	<meta property="twitter:url" content="/assets/images/eicon1.png" />
  	<!-- End -->

  	<!--  OpenGraph -->
  	<meta property="fb:app_id" content="inwecryptocom" />
  	<meta property="og:site_name" content="inwecrypto">
  	<meta property="og:title" content="InWeCrypto-社区" />
  	<meta property="og:type" content="article" />
  	<meta property="og:url" content="{{ Request::path() }}" />
  	<meta property="og:image" content="/assets/images/eicon1.png" />
  	<meta property="og:description" content="InWe-Community" />
  	<!-- End -->

  	<link rel="shortcut icon" href="/favicon.ico">
  	<link rel="stylesheet" href="/assets/css/base.css?{{ $jss_version }}" />
  	<link rel="stylesheet" href="/assets/css/articles.css?{{ $jss_version }}" />
  	<script type="text/javascript" src="/assets/js/jquery.min.js?{{ $jss_version }}"></script>
  	<script type="text/javascript" src="/assets/js/util.js?{{ $jss_version }}"></script>
</head>
<style>
	.headerBox .navBox {

		height: 0.7rem;
	}

	.headerBox .navBox input {
		width: 4.45rem;
		height: 0.48rem;
		background: rgba(255, 255, 255, 1);
		border: solid 1px #D2D2D2;
		margin-left: 0.2rem;
		padding: 0 0.1rem;
		box-sizing: border-box;
		box-shadow: 0.04rem 0.01rem 0.13rem rgba(0, 0, 0, 0.1);
	}

	.cont {
		padding-top: 1.3rem;
	}

	body.mobile {
		padding-bottom: 0rem!important;
	}
</style>

<body class="pace-done page-search ">
  <div class="headerBox">
    <script src="/template/top-en.js?{{ $jss_version }}"></script>
  </div>
<!--<div style="height: 0;width: 0;overflow: hidden;opacity: 0;">
			<script type="text/javascript">var cnzz_protocol = "https://";document.write(unescape("%3Cspan id='cnzz_stat_icon_1273500830'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1273500830%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
		</div> -->
  <div class="cont">
  	<div class="view-mobile">
	  	<h1 class="hidden" title="inwecrypto"> inwecrypto </h1>
			<img class="title" src="/assets/images/logo_search.png" alt="" />
	  	<div class="input">
	  		<input type="text" />
	  	</div>
  	</div>

		<ul class="articles">
            @foreach($articles as $article)
            <li><a href="{{ action('ArticleController@show', ['art_id' => $article['id']]) }}">
                @if(in_array($article['type'], [2,3,4,6,12,13,14,15]) && $article['img'])
                <img src="{{ $article['img'] }}" />
                @endif
                <div>
                <h2>{{ $article['title'] }}</h2>
                    <p>{{ $article['created_at'] }}</p>
                    @if (!empty($article['is_sole']))
                    <section>Original</section>
                    @endif
                </div>
            </li></a>
            @endforeach
		</ul>

      	{!! $articles->links() !!}
  </div>


  <script src="/template/footer.js?{{ $jss_version }}"></script>



<script>

	$(function(){
		$(".articles li div p").each(function(){
			$(this).text(getLocalTime($(this).text()))
		})
    $(".headerBox .navBox .eleft").append('<input class="search" type="text" />')

		$(".headerBox input").val('{{ $k }}');
		$(".input input").val('{{ $k }}');

		$(".headerBox input").bind("keydown",function(e){
			var theEvent = e || window.event;
		　var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
			if (code == 13){
				location.href="/en/search/all?k="+$(".headerBox input").val();
			}
		});
	})

</script>
</body>
</html>
