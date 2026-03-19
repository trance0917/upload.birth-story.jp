<?php

use Illuminate\Support\Facades\Facade;

return [
    //ユーザサイトのURL
    'front_app_url' => env('FRONT_APP_URL', '/'),

    'line_message_channel_secret' => env('LINE_MESSAGE_CHANNEL_SECRET', ''),
    'line_message_channel_token' => env('LINE_MESSAGE_CHANNEL_TOKEN', ''),
    'admin_line_user_id' => env('ADMIN_LINE_USER_ID', ''),

    'zip_download_basic_username' => env('ZIP_DOWNLOAD_BASIC_USERNAME', 'hachiya'),
    'zip_download_basic_password' => env('ZIP_DOWNLOAD_BASIC_PASSWORD', 'keiichiro'),
    'admin_address' => env('ADMIN_ADDRESS', 'kei8@apost.plala.or.jp'),

];
