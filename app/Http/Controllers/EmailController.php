<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use phpseclib3\Crypt\PublicKeyLoader;
use Illuminate\Support\Facades\Http;

class EmailController
{
    /**
     * Display a listing of the resource.
     *
    * @return \Illuminate\Http\Response
     */
    public static function send($message = [
        "sender" =>
        [
            "email_here@domain.com",
            "your app name here"
        ],
        "recipient" => "hereistheemail@domain.com",
        "subject" => "This is default subject",
        "content" =>
        [
            "Hi you have register in this system",
            "yur rder for ",
            "Would like to sibscribe tto our news ?"
        ]
    ])
    {
        //encypt using sym n msg
        $encryption_key = openssl_random_pseudo_bytes(32);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

        $ciphertext = openssl_encrypt((String) json_encode($message), 'aes-256-cbc', $encryption_key, 0, $iv);

        //encrytp using asym n enc_key
        $key = PublicKeyLoader::load(Storage::get('private_key.pem'),false);
        $cipherSymKey = $key->getPublicKey()->encrypt($encryption_key);

        $data = [
            'content' => base64_encode($ciphertext),
            'public_key' => trim($key->getPublicKey()),
            'enc_key' => base64_encode($cipherSymKey).':#:'.base64_encode($iv),
        ];

        return $response = Http::post(env('EMAIL_API').'/api/sendMail',$data);
    }
    /* example message nk send
    $message = [
        "sender" =>
        [
            "n_replpy@mcnchess.com","Mac n chiss"
        ],
        "recipient" => "hereistheemail@gmail.com",
        "subject" => "Thank You for registering",
        "content" =>
        [
            "Hi you have register in this system",
            "yur rder for ",
            "Would like to sibscribe tto our news ?"
        ]
    ];
    */
}
