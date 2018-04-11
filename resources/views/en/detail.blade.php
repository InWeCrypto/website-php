<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
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
    <meta name="description" content="title">
    <!--  twitter -->
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:site" content="@inwecryptocom" />
    <meta property="twitter:title" content="{ $title }}" />
    <meta property="twitter:description" content="{{ $desc ?? $title }}" />
    <meta property="twitter:url" content="/assets/images/eicon1.png" />
    <!-- End -->

    <!--  OpenGraph -->
    <meta property="fb:app_id" content="inwecryptocom" />
    <meta property="og:site_name" content="inwecrypto">
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ Request::path() }}" />
    <meta property="og:description" content="{{ $desc ?? $title }}" />
    <!-- End -->

    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/assets/css/base.css" />
    <link rel="stylesheet" href="/assets/css/detail.css">
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/util.js"></script>
    <title>InWeCrypto - {{ $title }}</title>
    <style>
        .mobile .download {
            display: flex;
        }

        .download {
            position: fixed;
            bottom: 0;
            right: 0;
            left: 0;
            height: 1rem;
            width: 100%;
            background: rgba(0, 152, 87, 1);
            box-shadow: 5px 1px 18px rgba(0, 0, 0, 0.16);
            padding: 0 0.3rem;
            box-sizing: border-box;
            align-items: center;
            justify-content: space-between;
        }

        .download .left {
            display: flex;
        }

        .download .left>img {
            width: 0.7rem;
            height: 0.7rem;
            margin-right: 0.2rem;
            float: left;
        }

        .download .ct img {
            height: 0.25rem;
            width: auto;
            margin-bottom: 0.1rem;
            margin-top: 0.07rem;
        }

        .download .ct p {
            line-height: 0.3rem;
            font-size: 0.22rem;
            color: rgba(255, 255, 255, 1);
        }

        .download a {
            display: block;
            width: 1.32rem;
            height: 0.54rem;
            line-height: 0.54rem;
            background: rgba(255, 255, 255, 1);
            border-radius: 0.04rem;
            text-align: center;
            font-size: 0.24rem;
            color: rgba(255, 85, 0, 1);
        }
    </style>
    <title></title>
</head>

<body class="pc pace-done">
    <div class="content">
        <div class="headerBox">
            <script src="/template/top-en.js"></script>
        </div>
        <div class="page">
            <h1 class="title">{{ $title }}</h1>
            <div class="box clearfix">
                <div class="left fl">
                    <span class="time">{{ $created_at }}</span>
                    @if ($is_sole == 1)
                    <span class="flag">Original</span>
                    @endif
                </div>
                <div class="right fr pcView">
                    <a class="href weiboIcon js-weibo"></a>
                    <a class="href twitterIcon js-twitter"></a>
                    <a class="href qqIcon js-qq"></a>
                </div>
            </div>
            <div class="article">
                {!! $content !!}
            </div>
        </div>
        <div class="globalFooter">
            <footer>
                <p>
                    <span class="number">{{ $click_rate }}</span>&nbsp;&nbsp;Readed
                </p>
                <div class='btn-box clearfix pcView'>
                    <span class="btn right" onclick="location.href='https://t.me/inwe_crypto'">Join InWeCrypto</span>
                    <span class="btn right" onclick="location.href='/en/download'">Download</span>
                </div>
            </footer>
            <div class="footer pcView">
                <script src="/template/footer.js"></script>
            </div>
        </div>
    </div>
    <div class="download mView">
        <div class="left">
            <img src="/assets/images/logo_download.png" alt="" />
            <div class="ct">
                <img src="/assets/images/inwecrypto_download.png" alt="" />
                <p>Download to view more</p>
            </div>
        </div>
        <a href="/en/download">Download</a>
    </div>
    <div class="footer pcView">
        <script src="/template/footer.js"></script>
    </div>
</body>
<script>
    var search = function (e) {
        var theEvent = e || window.event;
        var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
        if (code == 13) {
            location.href = "/en/search/all?k=" + $(this).val();
        }
    }

    $(function () {

        $(".input input").bind("keydown", search);

        $(".kw-ctl").click(function () {
            $(".kw-ctl").toggleClass("active");
            $(".keyWords").toggleClass("open");
        });

        //手机端时
        if (!IsTouchDevice) {
            $(".headerBox .navBox .eleft").append('<input class="search" type="text" />');
            var headInput = $(".headerBox .navBox .eleft .search");
            // var searchInput = $(".input input");
            headInput.bind("keydown", search);
            //		headInput.val(decodeURIComponent(location.search.replace("?kw=","")));
            headInput.bind("input", function () {
                searchInput.val($(this).val());
            })
            // searchInput.bind("input", function () {
            //     headInput.val($(this).val());
            // });
            var offsetTop = parseInt($('.page').offset().top) + 100;
            $(window).scroll(function (e) {
                var pageHeight  = $('.page')[0].getBoundingClientRect().top;
                if ( Math.abs(pageHeight) >= offsetTop) {
                    $(".headerBox .navBox").addClass("active");
                } else {
                    $(".headerBox .navBox").removeClass("active");
                }
            })
        }
    })
</script>
<script src="/assets/js/share.js"></script>

</html>
