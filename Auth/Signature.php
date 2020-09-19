<?php

require_once "../core.php";
require_once "Token.php";

    class Signature {
        public function getSignature()
        {
            $url        = "https://sandbox.partner.api.bri.co.id";
            $body       = "";
            $verb       = "GET";
            $newToken   = new Token;
            $NoRek      = REKENING;
            $path       = "/sandbox/v2/inquiry/".$NoRek;
            $token      = $newToken->getToken();
            $secret     = CONSUMER_SECRET;
            $timestamp  = gmdate("Y-m-d\TH:i:s.000\Z");

            $payload = "path=$path&verb=$verb&token=Bearer $token&timestamp=$timestamp&body=$body";

            $signPayload = hash_hmac('sha256', $payload, $secret, true);
            $base64sign = base64_encode($signPayload);
            return $base64sign;
        }
    }

    $getSignature = new Signature;
    print_r($getSignature->getSignature());