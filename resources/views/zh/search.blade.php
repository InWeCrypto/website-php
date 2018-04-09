<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>InWe社区</title>
  <meta name="renderer" content="webkit" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="icon" type="image/x-icon" href="/static/logo.png">
  <link rel="stylesheet" href="/assets/css/base.css" />
  <link rel="stylesheet" href="/assets/css/articles.css" />
  <script type="text/javascript" src="/assets/js/jquery.min.js" ></script>
  <script type="text/javascript" src="/assets/js/util.js" ></script>
</head>
<style>
	.headerBox .navBox{
		background:rgba(247,247,247,1);
		height: 0.7rem;
	}
	.headerBox .navBox input{
		width:4.45rem;
		height:0.48rem;
		background:rgba(255,255,255,1);
		border: solid 1px #D2D2D2;
		margin-left: 0.2rem;
		padding: 0 0.1rem;
		box-sizing: border-box;
		box-shadow:0.04rem 0.01rem 0.13rem rgba(0,0,0,0.1);
	}
	.cont{
		padding-top: 1.3rem;
	}
	body.mobile{
		padding-bottom: 0rem!important;
	}
</style>
<body class="pace-done">
  <div class="headerBox">
    <script src="/template/top.js"></script>
  </div>

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
                @if(in_array($article['type'], [2,3,4,6]) && $article['img'])
                <img src="{{ $article['img'] }}" />
                @endif
                <div>
                <h2>{{ $article['title'] }}</h2>
                    <p>{{ $article['created_at'] }}</p>
                    @if (!empty($article['is_sole']))
                    <section>原创</section>
                    @endif
                </div>
            </li></a>
            @endforeach
		</ul>


        {!! $articles->links() !!}

  </div>

 <!-- <a class="join" title="加入InWe讨论组"></a>-->

  <script src="/template/footer.js"></script>



<script>

	$(function(){
		$(".headerBox .navBox .eleft").append('<input class="search" type="text" />')

		$(".headerBox input").val('{{ $k }}');
		$(".input input").val('{{ $k }}');

		$(".headerBox input").bind("keydown",function(e){
			var theEvent = e || window.event;
		　var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
			if (code == 13){
                location.href="/zh/search/all?k="+$(".headerBox input").val();
			}
		});
	})

</script>
</body>
</html>
