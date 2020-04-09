<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\MessageStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Libraries\RSACrypt as RSA;


class MessagesController extends Controller
{
   
   
   public function decrypt()
   {
        $publicKey = Storage::disk('local')->get('keys/default/public.pem');
        $privateKey = Storage::disk('local')->get('keys/default/private.pem');
        $rsa = new RSA($publicKey, $privateKey);

        $data = 'abc123';
        $encryptedData = $rsa->encrypt($data);
        $decryptedData = $rsa->decrypt($encryptedData);

        return response()->json(["data" => $decryptedData], 400);
   }

   
}
