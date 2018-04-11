$(function() {
    var _width = '500px';
    var _height = '500px';
    var _top= '50px';
    var _left= '50px';
    $('.pc').off().on('click', '.js-weibo', function(e) {
        event.preventDefault();
        var _shareUrl = 'http://v.t.sina.com.cn/share/share.php?&appkey=895033136';     //真实的appkey，必选参数
        
        _shareUrl += '&url='+ encodeURIComponent(document.location);     //参数url设置分享的内容链接|默认当前页location，可选参数
        _shareUrl += '&title=' + encodeURIComponent(document.title);    //参数title设置分享的标题|默认当前页标题，可选参数
        _shareUrl += '&content=' + 'utf-8';   //参数content设置页面编码gb2312|utf-8，可选参数
        window.open(_shareUrl,'_blank','width='+_width+',height='+_height+',top='+_top+',left='+_left+',toolbar=no,menubar=no,scrollbars=no, resizable=1,location=no,status=0');
    }).on('click', '.js-qq', function() {
        var _shareUrl = 'http://connect.qq.com/widget/shareqq/index.html?';
        var p = {
            url: location, /*获取URL，可加上来自分享到QQ标识，方便统计*/
            desc: '', /*分享理由(风格应模拟用户对话),支持多分享语随机展现（使用|分隔）*/
            title: '咨询详情', /*分享标题(可选)*/
            summary: '', /*分享摘要(可选)*/
            pics: '', /*分享图片(可选)*/
            flash: '', /*视频地址(可选)*/
            site:'', /*分享来源(可选) 如：QQ分享*/
            style:'201',
            width:32,
            height:32
        };
        var s = [];
        for(var i in p){
            s.push(i + '=' + encodeURIComponent(p[i]||''));
        }
        _shareUrl += s.join('&');
        window.open(_shareUrl, '_blank', 'width='+_width+',height='+_height+',top='+_top+',left='+_left+',toolbar=no,menubar=no,scrollbars=no, resizable=1,location=no,status=0'); 
    }).on('click', '.js-twitter', function() {
        var _shareUrl = 'http://twitter.com/intent/tweet?';

        _shareUrl += 'url=' + encodeURIComponent(location.href);    //分享的链接
        _shareUrl += '&text=' + encodeURIComponent(document.title);    //分享的标题
        window.open(_shareUrl,'_blank','width='+_width+',height='+_height+',left='+_left+',top='+_top+',toolbar=no,menubar=no,scrollbars=no,resizable=1,location=no,status=0');
    })
})