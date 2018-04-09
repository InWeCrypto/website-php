<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>InWeCrypto</title>
  <meta name="renderer" content="webkit" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="icon" type="image/x-icon" href="./static/logo.png">
  <link rel="stylesheet" href="/assets/css/base.css" />
  <link rel="stylesheet" href="/assets/css/articles.css" />
  <script type="text/javascript" src="/assets/js/jquery.min.js" ></script>
  <script type="text/javascript" src="/assets/js/util.js" ></script>
</head>
<body class="pace-done">
  <div class="headerBox">
    <script src="/template/top-en.js"></script>
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
  		<img class="open active" src="/assets/images/open_icon.png"/>
  		<img class="close" src="/assets/images/close_icon.png"/>
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
                    <section>原创</section>
                    @endif
                </div>
            </li></a>
            @endforeach
		</ul>

  	     {!! $articles->links() !!}
  </div>


  <a class="join" target="_blank" title="Join In InWe" href="https://t.me/inwe_crypto"></a>

  <div class="download">
  	<div class="left">
  		<img src="/assets/images/logo_download.png" alt=""/>
  		<div class="ct">
  			<img src="/assets/images/inwecrypto_download.png" alt=""/>
  			<p>Download to view more info!</p>
  		</div>
  	</div>
  	<a href="download.html">download app</a>
  </div>


  <script src="/template/footer.js"></script>



<script>

	$(function(){

		$(".input input").bind("keydown",function(e){
			var theEvent = e || window.event;
		　var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
			if (code == 13){
				location.href="/en/search/all?k="+$(this).val();
			}
		});

		$(".kw-ctl").click(function(){
			$(".kw-ctl").toggleClass("active");
			$(".keyWords").toggleClass("open");
		});


	})

</script>
</body>
</html>
