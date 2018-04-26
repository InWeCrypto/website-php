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
  	<meta name="description" content="InWe-community">
  	<meta property="description" content=""/>
  	<!--  twitter -->
  	<meta property="twitter:card" content="summary" />
  	<meta property="twitter:site" content="@inwecryptocom" />
  	<meta property="twitter:title" content="inwecrypto-community" />
  	<meta property="twitter:description" content="InWe-community" />
  	<meta property="twitter:url" content="/assets/images/eicon1.png" />
  	<!-- End -->

  	<!--  OpenGraph -->
  	<meta property="fb:app_id" content="inwecryptocom" />
  	<meta property="og:site_name" content="inwecrypto">
  	<meta property="og:title" content="inwecryptocom" />
  	<meta property="og:type" content="article" />
  	<meta property="og:url" content="{{ Request::path() }}" />
  	<meta property="og:image" content="/assets/images/eicon1.png" />
  	<meta property="og:description" content="InWe-community" />
  	<!-- End -->

  	<link rel="shortcut icon" href="/favicon.ico">
  	<link rel="stylesheet" href="/assets/css/base.css?{{ $jss_version }}" />
  	<link rel="stylesheet" href="/assets/css/articles.css?{{ $jss_version }}" />
  	<script type="text/javascript" src="/assets/js/jquery.min.js?{{ $jss_version }}"></script>
  	<script type="text/javascript" src="/assets/js/util.js?{{ $jss_version }}"></script>
</head>

<body class="pace-done page-index">
	<div class="headerBox">
		<script src="/template/top-en.js?{{ $jss_version }}"></script>
	</div>
<div style="height: 0;width: 0;overflow: hidden;opacity: 0;">
			<script type="text/javascript">var cnzz_protocol = "https://";document.write(unescape("%3Cspan id='cnzz_stat_icon_1273500830'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1273500830%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
		</div> 
	<div class="cont">
		<h1 class="hidden" title="inwecrypto"> inwecrypto </h1>
		<img class="title" src="/assets/images/logo_search.png" alt="" />
		<div class="input">
			<input type="text" />
		</div>
		<ul class="keyWords">
            @foreach($search_keywords as $item)
            <li><a href="/en/search/all?k={{ $item['name'] }}">{{ $item['name'] }}</a></li>
            @endforeach
		</ul>
		<div class="kw-ctl">
			<img class="open active" src="/assets/images/open_icon.png" />
			<img class="close" src="/assets/images/close_icon.png" />
		</div>


		<ul class="articles">
            @foreach($articles as $article)
            <li><a href="{{ action('ArticleController@show', ['art_id' => $article['id']]) }}">
                @if(in_array($article['type'], [2,3,4,6]) && $article['img'])
                <img src="{{ $article['img'] }}" />
                @endif
                <div>
                <h2>{{ $article['title'] }}</h2>
                    <p>{{ $article['created_at'] }}</p>
                    @if ($article['is_sole'] == 1)
                    <section>Original</section>
                    @endif
                </div>
            </li></a>
            @endforeach
		</ul>

		{!! $articles->links() !!}
	</div>



	<a class="join pcView" target="_blank" title="Join In InWe" href="https://t.me/inwe_crypto"></a>

	<div class="download">
		<div class="left">
			<img src="/assets/images/logo_download.png" alt="" />
			<div class="ct">
				<img src="/assets/images/inwecrypto_download.png" alt="" />
				<p>Download to view more</p>
			</div>
		</div>
		<a href="https://t.me/inwe_crypto">Join InWe</a>
		<a href="/en/download_app">Download</a>
	</div>


		<script src="/template/footer.js?{{ $jss_version }}"></script>

<script>

//	$(".input input").val(decodeURIComponent(location.search.replace("?kw=","")));


	var search = function(e){
		var theEvent = e || window.event;
	　var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
		if (code == 13){
			location.href="/en/search/all?k="+$(this).val();
		}
	}

	$(function(){
		$(".articles li div p").each(function(){
			$(this).text(getLocalTime($(this).text()))
		})
		$(".input input").bind("keydown",search);

		$(".kw-ctl").click(function(){
			$(".kw-ctl").toggleClass("active");
			$(".keyWords").toggleClass("open");
		});

		//手机端时
		if(!IsTouchDevice){
			$(".headerBox .navBox .eleft").append('<input class="search" type="text" />');
			var headInput = $(".headerBox .navBox .eleft .search");
			var searchInput = $(".input input");
			headInput.bind("keydown",search);
	//		headInput.val(decodeURIComponent(location.search.replace("?kw=","")));
			headInput.bind("input",function(){
				searchInput.val($(this).val());
			})
			searchInput.bind("input",function(){
				headInput.val($(this).val());
			})
			var offsetTop = $(".input input").offset().top;
			$("body").scroll(function(e){
				if(Math.abs($(".cont")[0].getBoundingClientRect().top) >= offsetTop){
					$(".headerBox .navBox").addClass("active");
					$(".cont .keyWords").addClass("active");
				}else{
					$(".headerBox .navBox").removeClass("active");
					$(".cont .keyWords").removeClass("active");
				}
			})
		}

	})

	</script>
</body>
</html>
