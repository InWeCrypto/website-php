<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>InWeCrypto IOS(App) Download</title>
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
    <meta name="description" content="How to install InWeCrypto app (iOS) 1.Download App 2. Trusted Root Certificate 3. Open the App">
    <!--  twitter -->
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:site" content="@inwecryptocom" />
    <meta property="twitter:title" content="InWeCrypto IOS Download" />
    <meta property="twitter:description" content="How to install InWeCrypto app (iOS) 1.Download App 2. Trusted Root Certificate 3. Open the App"
    />
    <meta property="twitter:url" content="/assets/images/eicon1.png" />
    <!-- End -->

    <!--  OpenGraph -->
    <meta property="fb:app_id" content="inwecryptocom" />
    <meta property="og:site_name" content="inwecrypto">
    <meta property="og:title" content="InWeCrypto IOS下载" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ Request::path() }}" />
    <meta property="og:image" content="/assets/images/eicon1.png" />
    <meta property="og:description" content="How to install InWeCrypto app (iOS) 1.Download App 2. Trusted Root Certificate 3. Open the App"
    />
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    <link rel="stylesheet" href="/assets/css/base.css?{{ $jss_version }}" />
    <link rel="stylesheet" href="/assets/css/downios.css?{{ $jss_version }}" />
    <script type="text/javascript" src="/assets/js/jquery.min.js?{{ $jss_version }}"></script>
    <script type="text/javascript" src="/assets/js/util.js?{{ $jss_version }}"></script>
</head>

<body style="padding-left: 54px; padding-right: 54px;" class="pace-done">
    <div class="container m-container e-hugeDownIosBox" id="e-hugeDownIosBox">
        <div class="imgCover1">
            <img src="/assets/images/dyou_yingying.png" alt="" />
        </div>
        <div class="headerBox">
            <script src="/template/top-en.js?{{ $jss_version }}"></script>
            <p class="mess1">How to install InWeCrypto app (iOS)?</p>
            <p class="mess2">
                <img src="/assets/images/fiosqrcode.jpg" alt="" />
            </p>
            <p class="mess3">Scan the QR code to download</p>
            <button class="downloadIosBtn mView" onclick="location.href='/en/download_app'">Download</button>
        </div>
        <div class="downloadBox" id="downloadBox">
            <div class="downloadPhoneImg">
                <img src="/assets/images/fdownloadapp.png" alt="" />
            </div>
            <div class="mobileDownload">
                <p class="mmess1">1.Download App</p>
                <p class="mmess2">
                    Open the url with Safari and install the app on your mobile phone.
                    <br/> (Note: if your WeChat can’t open the url, please open it with
                    <br/> Safari and follow the steps to install the app.)
                </p>
            </div>
        </div>
        <div class="pcDownloadBox">
            <div class="imgCover2">
                <img src="/assets/images/eicon18.png" alt="" />
            </div>
            <div class="imgCover3">
                <img src="/assets/images/eicon19.png" alt="" />
            </div>
            <div class="pcDownload">
                <p class="mess1">2. Trusted Root Certificate</p>
                <p class="mess2">
                    When the app is downloaded, user will encounter
                    <br/> a warning of “Untrusted App Developer”.
                    <br/> Then please open Settings -> General -> Device Management -> Trust App.
                </p>
            </div>
            <div class="pcImg">
                <img src="/assets/images/fapplication_book.png" alt="" />
            </div>
        </div>
        <div class="downloadBox " id="openApp">
            <div class="downloadPhoneImg">
                <img src="/assets/images/fopenapp.png" alt="" />
            </div>
            <div class="mobileDownload">
                <p class="mmess1">3. Open the App</p>
                <p class="mmess2">
                    After the app is trusted, you can open the app and start your experience.
                </p>
            </div>
        </div>
        <script src="/template/footer.js?{{ $jss_version }}"></script>
    </div>
</body>

</html>
