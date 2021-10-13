<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],



    'facebook' => [
        'client_id' => '450732055904808', //Facebook API
        'client_secret' => 'ecc04913aecf74f36073f32aad9dc420', //Facebook Secret
        'redirect' => `{{env("MAIN_URL")}}/login/facebook/callback`,
    ],

    "google" => [
        'client_id' => '643317946965-4s7rikahifojrd8hgov7sri6imuqgaqb.apps.googleusercontent.com',
        'client_secret' => '6h4fBLnnmCdpfBGxSY_UYp_F', //Facebook Secret
        'redirect' => `{{env("MAIN_URL")}}/login/google/callback`,
    ],



    "instagram" => [
        'client_id' => '174665673769858', //google API
        'client_secret' => '81f8364bbda0a7f29e4b4b7bc50b43fc', //Facebook Secret
        'redirect' => `{{env("MAIN_URL")}}/login/instagram/callback`,
    ],

    "linkedin" => [
        'client_id' => '86jv84txoajhrf', //google API
        'client_secret' => '3AOPHs1zyi6jJ65A', //Facebook Secret
        'redirect' => `{{env("MAIN_URL")}}/login/linkedin/callback`,
    ],

  "twitter" => [
        'client_id' => 'zFXrlTBdsqnTTQuEuKNyseYDm',
        'client_secret' => 'X7o6Z2PfSnkAcEJsaTkVhStlIMGnWj5O2wsVG5J8yvs5ERUsSn',
        'oauth_token'=>'AAAAAAAAAAAAAAAAAAAAAP4THAEAAAAATXs%2F1xyKiF%2BJK9IedkKMTylXLE8%3D563GWzBKi3hTT9wUOq07froIASLzbHBIoF27Z88fm8TurCNhxt',
        'redirect' => `{{env("MAIN_URL")}}/login/twitter/callback`,
    ],



    'firebase' => [
        'api_key' => 'AIzaSyBeRPwLmr6bY4J5Pq1gNf_tI3nnm2G0bOg',
        'auth_domain' =>'haraj-plus-1ae1f.firebaseapp.com',
        'database_url' => 'https://haraj-plus-1ae1f.firebaseio.com',
        'secret' => '5dZskNb9sgAROyIR47WcfYZu5EQBfoDJco4qTzz1',
        'storage_bucket' => 'haraj-plus-1ae1f.appspot.com',
        'project_id' => 'haraj-plus-1ae1f',
        'messaging_sender_id' => '944069048567'
    ],



    // 'firebase' => [
    //     'database_url' => env('FIREBASE_DATABASE_URL', 'https://fan-academic.firebaseio.com/'),
    //     'project_id' => env('FIREBASE_PROJECT_ID', 'fan-academic'),
    //     'private_key_id' => env('FIREBASE_PRIVATE_KEY_ID', '05c5bfd318357ff6c52c9b318541e16ece3b5968'),
    //     'private_key' => str_replace("\\n", "\n", env('FIREBASE_PRIVATE_KEY', '-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCfBYIaQX+tym/4\nXzwe3eF7wKXVgSX7YNxTpvshqOphPnI1BbBphaCXiJt4lCjwejfeSTc0KRiMiSgb\nFaEeaEMmch/eB4qopDNHeos0xHEbAv41aQyd44ZdURZLgBxZb+gK4cSBtHwtJ27X\n/UtDODIFtKeOaebJ7cgXh/yhH8izw0RcdMZ39fb36ddo3hIrPJC8NsoPAnyVYPxj\n/ik7mgL+/hhAIhvIe+BCeaJ2lKoM63iQ5hJnpF2j1Kf9vXVYqXcIyiuEk95L7t1a\nFMjnkYLkb//bPcWiVK2cJGwlfK4Qxbp6sRGrqF5OdfuOKXE8fmym38rfl2nYthIB\neQlC0KSdAgMBAAECggEAGbJT6wa9CVoeXGIVTr6Xjn4bviPLvbKR//GKgM6xKywi\nW+eSsYaOpBYG24YDlJKHXyPxJ/xhE2qhgLjuy4FZIogMFr6cvTIleC44+vqodU83\nQW27hHMNFhzBj8tAqYIwGrwPW09NRqWp33y2kgLtcGcYMWbzDJvgOs82d1nxvnx0\n0mHSzEXj8kmlXCHgvIMWYxNc4TzU0ln9ysymObrf+oR73K/f7OddMTwQ1dTMlk8L\nkzLeZRDnq4s4hXJTBYzODPwTh2LlkexBfBDNZuV9GFudRKAU7trGUo11dQDF6ktZ\naDGcju4ig4EUZ6lQe/x2yIRg0kZ1ianunwFpf7UXqQKBgQDTfoTSarH2+TJ9lNGx\ni8H/ONZqATHumNWielQpTa6+g1E9FxyAmIF7ntBHWIWcuuQvOmS41nBlJoHHF1Y4\n3g44Fw2V7aWHb25hfNsIvaqT/Yv6hAeoo1aLF6NZ6HMq0Ip5xqtYOUTcVQslUZkV\nfBGEMTGt4HswDyC4S6OCVTqzCQKBgQDAfDa3SL7Guv+1sRaTXXjd3DgMpFkYa//R\n9jkzdqVodJTQD4T/AoaI6KVDTzACEj0AiNRC+Q/WkFB9Zi+5Ks8VM8lrgtIbKG8e\nHm0BLb4CGuyo4/5ZskrQXPlntCB2CFe8aI2hytiE80TgBVjY45GEkg43t10QDjY3\nTqybmWsl9QKBgDsjx9RnDXi4WkwPj0uMfyT1Kc/eoa3MgwC6IEqkdFbFtbPVgJzd\nCGgfErLAqCwZfrFOLNga7rb6O5QGjI++WE+K8ruYBo+Gs2EDXuRk1Qwo/DmDLfkU\nI6ElbQI5I+s3AWHoEgXLjdvm1AUNejctyGAkuXWbrhbURBwE2qYZWx6xAoGBAJiY\nIHxu5CcCCkQM7tvGx1IDCkAjbippO/ZEn5ZH4duMSIklNIdBhkw1OwbAWUvbD5dD\n4hpx/ndYEydGgmDmKiMh2fUsUcqL5INZFYtQqwhaNfGyRWrwaFUE0AfBidZoyL0p\nmdaAy+OiQ6DhPE09I5iYfUL4T4Ox8JMqALaeCo6dAoGAY5d3kvJU8WqNysRQXbuS\nUX6Ssi1nBaEVurSCttpp6UEGHa6iwMqDGXF7yYaeSZ0ugr+4nDLO15Uf4HokigBr\n8vRnQH+KoEj7DJOv0WkBBtV8jp1mX5BhsKQKCk8z17B1U3bnfbILifIXNm+AzfvV\nk8OSid4wp6W6fjd1bxsGy3c=\n-----END PRIVATE KEY-----\n')),
    //     'client_email' => env('FIREBASE_CLIENT_EMAIL', 'fan-academic@appspot.gserviceaccount.com'),
    //     'client_id' => env('FIREBASE_CLIENT_ID', '109046889972116885117'),
    //     'client_x509_cert_url' => env('FIREBASE_CLIENT_x509_CERT_URL', 'https://www.googleapis.com/robot/v1/metadata/x509/fan-academic%40appspot.gserviceaccount.com'),
    // ],


];
