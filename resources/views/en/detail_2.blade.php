<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
    <meta property="twitter:title" content="{{ $title }}" />
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
</head>

<body class="pc pace-done page-index" style="margin: 0;">
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
</body>

</html>
