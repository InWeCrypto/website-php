<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>InWeCrypto APP下载</title>
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
  <meta name="keywords" content="InWeCrypto APP下载"/>
  <meta name="description" content="多平台终端接入 支持iOS、Android、Windows、Mac等多个场景应用"/>

  <!--  twitter -->
	<meta property="twitter:card" content="summary" />
  <meta property="twitter:site" content="@inwecryptocom" />
  <meta property="twitter:title" content="InWeCrypto APP下载" />
  <meta property="twitter:description" content="多平台终端接入 支持iOS、Android、Windows、Mac等多个场景应用" />
  <meta property="twitter:url" content="/assets/images/eicon1.png" />
	<!-- End -->

	<!--  OpenGraph -->
  <meta property="fb:app_id" content="inwecryptocom"/>
  <meta property="og:site_name" content="inwecrypto">
  <meta property="og:title" content="InWeCrypto APP下载"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="{{ Request::path() }}"/>
	<meta property="og:image" content="/assets/images/eicon1.png"/>
  <meta property="og:description" content="多平台终端接入 支持iOS、Android、Windows、Mac等多个场景应用"/>
  <!-- End -->

  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="/assets/css/base.css?{{ $jss_version }}" />
  <link rel="stylesheet" href="/assets/css/download.css?{{ $jss_version }}" />
  <script type="text/javascript" src="/assets/js/jquery.min.js?{{ $jss_version }}"></script>
  <script type="text/javascript" src="/assets/js/util.js?{{ $jss_version }}"></script>
</head>

<body>
    <div class="container m-container e-hugeDownLoadBox" id="e-hugeDownLoadBox">
        <div class="imgCover1">
            <img src="/assets/images/dyou_yingying.png" alt="" />
        </div>
     <!--   <div style="height: 0;width: 0;overflow: hidden;opacity: 0;">
			<script type="text/javascript">var cnzz_protocol = "https://";document.write(unescape("%3Cspan id='cnzz_stat_icon_1273500830'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1273500830%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
		</div> -->
        <div class="headerBox">
            <script src="/template/top.js?{{ $jss_version }}"></script>
            <p class="mess1">多平台终端接入</p>
            <p class="mess2">支持iOS、Android、Windows、Mac等多个场景应用</p>
            <div></div>
        </div>
        <div class="downloadBox" id="downloadBox">
            <div class="mobileDownload">
                <p class="mmess1">移动端下载</p>
                <p class="mmess2">一款有态度的App</p>
                <div class="btnBox">
                    <a href="/zh/downios">
                        <div class="ios">
                            <span class="icon"></span>
                            <span class="text">IOS</span>
                        </div>
                    </a>
                    <div class="and" onclick="location.href='/zh/downandroid'">
                        <span class="icon"></span>
                        <span class="text">Android</span>
                    </div>
                </div>
            </div>
            <div class="downloadPhoneImg">
                <img src="/assets/images/dphone.png" alt="" />
            </div>
        </div>
        <div class="pcDownloadBox">
            <div class="imgCover2">
                <img src="/assets/images/dzuo_yingying.png" alt="" />
            </div>
            <div class="pcImg">
                <img src="/assets/images/dpc.png" alt="" />
            </div>
            <div class="pcDownload">
                <p class="mess1">PC客户端下载</p>
                <p class="mess2">敬请期待</p>
                <div class="btnBox">
                    <div class="ios" id='macdownload'>
                        <span class="icon"></span>
                        <span class="text">Mac</span>
                    </div>
                    <div class="and" id='windownload'>
                        <span class="icon"></span>
                        <span class="text">Windows</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="contactBox" id="contactBox">
            <div class="titlev">Contact Us</div>
            <div class="imgBox">
                <img src="/assets/images/dfooter_logo.png" alt="" />
            </div>
            <ul class="iconBox ">
                <li>
                    <a href="mailto:support@inwecrypto.com">
                        <img src="/assets/images/eicon4.png" alt="" />
                    </a>
                </li>
                <li class="airportIcon">
                    <img src="/assets/images/eicon3.png" alt="" />
                    <img class="airportQrcode" src="/assets/images/commendus.jpeg" alt="" />
                </li>
                <li>
                    <img src="/assets/images/eicon5.png" alt="" />
                </li>
            </ul>
            <div class="footerText">
                ©InWeCrypto 2018
            </div>
        </div> -->

        <script src="/template/footer.js?{{ $jss_version }}"></script>
        <script>
            $(function(){

                var getUrl = function () {
                    let result = null
                    $.ajax({
                        url: 'https://inwecrypto-china.oss-cn-shanghai.aliyuncs.com/pc-wallet/latest-mac.json',
                        type: 'GET',
                        async: false,
                        success: function (res) {

                            if (res) {
                                var version = res.version;
                                var url = res.url.substring(0, res.url.lastIndexOf('/') + 1)
                                result = {
                                    mac: encodeURI(url + 'InWeCrypto-' + version + '.dmg'),
                                    win: encodeURI(url + "InWeCrypto Setup " + version + '.exe')
                                }
                            } else {
                                alert('获取json文件错误')
                            }
                        }
                    });
                    return result;
                }
                var pcDownloadURI = getUrl();
                /*if(pcDownloadURI){
                    var macd=$("#macdownload");
                    var wind=$("#windownload");
                    if(pcDownloadURI.mac&&pcDownloadURI.mac.length>0){
                        macd.addClass('effect');
                        macd.on('click',function(){
                            window.open(pcDownloadURI.mac)
                        })
                    }
                    if(pcDownloadURI.win&&pcDownloadURI.win.length>0){
                        wind.addClass('effect');
                        wind.on('click',function(){
                            window.open(pcDownloadURI.win)
                        })
                    }
                }*/
            });
        </script>
    </div>
</body>

</html>
