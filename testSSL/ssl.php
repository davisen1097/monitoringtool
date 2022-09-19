<?php

function is_ssl_exists($url)
{
    $orignal_parse = parse_url($url, PHP_URL_HOST);
    $get = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE)));
    $read = stream_socket_client("ssl://" . $orignal_parse . ":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $get);
    $cert = stream_context_get_params($read);
    $certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);

    if (isset($certinfo) && !empty($certinfo)) {
        if (
            isset($certinfo['name']) && !empty($certinfo['name']) &&
            isset($certinfo['issuer']) && !empty($certinfo['issuer'])
        ) {
            return true;
        }
        return false;
    }
    return false;
}

$domain = 'http://localhost:8080/dissert/monitoringtool/testSSL/ssl.php';

if (is_ssl_exists($domain)) {

    echo "SSL is enabled!";

} else {
	
    echo "No SSL";
}


?>