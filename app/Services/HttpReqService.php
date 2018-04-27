<?php

namespace App\Services;

class HttpReqService
{
    public $ch = null;
    public $url = '';
    public function __construct()
    {
        $this->ch  = curl_init();
    }
    public function __destruct()
    {
        // curl_close($this->ch);
    }
    public function url($url)
    {
        $this->url = $url;
        return $this;
    }

    private function createCh()
    {
        if(!is_resource($this->ch)){
            $this->ch  = curl_init();
        }
    }

    public function header($header)
    {
        $headers = [];
        foreach($header as $k => $val){
            $headers[] = $k . ': ' . $val;
        }
        $this->createCh();

        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);

        return $this;
    }

    public function proxy($host, $port)
    {
        $this->createCh();
        curl_setopt($this->ch, CURLOPT_HTTPPROXYTUNNEL, 0);
        curl_setopt($this->ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5_HOSTNAME);

        curl_setopt($this->ch, CURLOPT_PROXY, $host);
        curl_setopt($this->ch, CURLOPT_PROXYPORT, $port);
        return $this;
    }

    public function cookie($cookie)
    {
        $this->createCh();
        curl_setopt($this->ch, CURLOPT_COOKIE, $cookie);
        return $this;
    }

    public function request($body = [], $method = 'GET')
    {
        $this->createCh();
        curl_setopt($this->ch, CURLOPT_URL, $this->url);
        // 设置超时限制防止死循环
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 10);
        // 设置发起连接前的等待时间，如果设置为0，则无限等待。
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 10);
        // 将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        // 跳过证书检查
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
        switch (strtoupper($method)) {
            case "GET":
                curl_setopt($this->ch, CURLOPT_HTTPGET, true);
                break;
            case "POST":
                curl_setopt($this->ch, CURLOPT_POST, true);
                break;
            case "PUT":
                //使用一个自定义的请求信息来代替"GET"或"HEAD"作为HTTP请求。这对于执行"DELETE" 或者其他更隐蔽的HTT
                curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "PUT");
                break;
            case "DELETE":
                curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
        }
        if (count($body) > 0 && in_array($method, ['POST','PUT','DELETE'])) {
            curl_setopt($this->ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json; charset=utf-8']);
            // 全部数据使用HTTP协议中的"POST"操作来发送。
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($body));
        }else{

        }
        // 模拟浏览器请求
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'SSTS Browser/1.0');
        curl_setopt($this->ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)');

        $res = curl_exec($this->ch);

        $res_code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);

        curl_close($this->ch);

        if ($res_code != '200') {
            return $res;
        }

        return json_decode($res, true) ?? $res;
    }

    public function get()
    {
        return $this->request('GET');
    }

    public function post($body)
    {
        return $this->request($body, 'POST');
    }
}
