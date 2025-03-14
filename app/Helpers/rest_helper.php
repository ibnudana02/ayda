<?php

if (!function_exists('akses_api')) {
    function akses_api($method, $url, $data)
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request($method, $url, ['http_errors' => false, 'verify' => false, 'form_params' => ['nama' => $data]]);

        return $response->getBody();
    }
}
