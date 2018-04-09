<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="title" content="资讯详情">
    <meta name="referrer" content="always">
    <meta name="description" content="InWeCrypto offers both Blockchain news and multi-assets wallet for cryptocurrencies.
        Through our Op-Ed, trading views, and project up-dates, users can get data and information.Supporting ETH and NEO based tokens,
        our multi-asset wallet allows users to manage their assets efficiently and smartly.And soon it will support to your favorite NFT assets!">
    <meta property="og:title" content="InWeCrypto offers both Blockchain news and multi-assets wallet for cryptocurrencies.">
    <meta property="og:url" content="http://inwecrypto.com/">
    <meta name="twitter:description" content="InWeCrypto offers both Blockchain news and multi-assets wallet for cryptocurrencies.
        Through our Op-Ed, trading views, and project up-dates, users can get data and information.Supporting ETH and NEO based tokens,
        our multi-asset wallet allows users to manage their assets efficiently and smartly.And soon it will support to your favorite NFT assets!">
    <meta property="author" content="*">
    <meta property="og:type" content="article">
    <meta name="twitter:card" content="summary">
    <meta property="article:publisher" content="support@inwecrypto.com">
    <meta property="article:author" content="*">
    <meta name="robots" content="index, follow">
    <meta name="twitter:creator" content="@localhuman">
    <meta name="twitter:site" content="@Medium">
    <meta property="og:site_name" content="Medium">
    <meta name="twitter:label1" value="Reading time">
    <meta name="twitter:data1" value="3 min read">
    <meta property="al:web:url" content="http://inwecrypto.com/">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    <link rel="stylesheet" href="/assets/css/base.css" />
    <link rel="stylesheet" href="/assets/css/detail.css">
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/util.js"></script>
    <title>资讯详情</title>
</head>

<body class="pc pace-done">
    <div class="content">
        <div class="headerBox">
            <script src="/template/top.js"></script>
        </div>
        <div class="page">
            <h1 class="title">{{ $title }}</h1>
            <div class="box clearfix">
                <div class="left fl">
                    <span class="time">{{ $created_at }}</span>
                    @if ($is_sole == 1)
                    <span class="flag">原创</span>
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
            <footer>
                <p>
                    <span class="number">{{ $click_rate }}</span>人已读</p>
                <div class='btn-box clearfix pcView'>
                    <span class="btn right" onclick="location.href='https://t.me/inwe_crypto'">加入讨论组</span>
                    <span class="btn right" onclick="location.href='/zh/download'">下载APP</span>
                </div>
            </footer>
        </div>
    </div>
    <div class="footer pcView">
        <script src="/template/footer.js"></script>
    </div>
</body>
<script src="/assets/js/share.js"></script>

</html>
