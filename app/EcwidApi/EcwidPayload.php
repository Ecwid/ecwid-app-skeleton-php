<?php

namespace App\EcwidApi;

class EcwidPayload
{
    private $storeId;

    //private     Config::get('app.ecwid_app_namespace');

    public function getEcwidPayload($data) {
        // Get the encryption key (16 first bytes of the app's client_secret key)
        $encryption_key = substr(\Config::get('app.ecwid_app_secret_key'), 0, 16);

        // Decrypt payload
        $json_data = $this->aes_128_decrypt($encryption_key, $data);

        // Decode json
        $json_decoded = json_decode($json_data, true);
        return $json_decoded;
    }

    private function aes_128_decrypt($key, $data) {
        // Ecwid sends data in url-safe base64. Convert the raw data to the original base64 first
        $base64_original = str_replace(array('-', '_'), array('+', '/'), $data);

        // Get binary data
        $decoded = base64_decode($base64_original);

        // Initialization vector is the first 16 bytes of the received data
        $iv = substr($decoded, 0, 16);

        // The payload itself is is the rest of the received data
        $payload = substr($decoded, 16);

        // Decrypt raw binary payload
        $json = openssl_decrypt($payload, "aes-128-cbc", $key, OPENSSL_RAW_DATA, $iv);

        return $json;
    }

}
