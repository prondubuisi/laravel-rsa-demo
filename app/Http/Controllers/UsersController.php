<?php

namespace App\Http\Controllers;

use App\Libraries\RSACrypt as RSA;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Storage;
use App\User;



class UsersController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $validatedData = $request->validated();

        $rsa = new RSA(null, null);

        $keys = $rsa->generatePublicAndPrivateKeys();

        $publicKey = $keys['public_key'];
        $privateKey = $keys['private_key'];
        $userName = $validatedData['name'];
        Storage::disk('local')->put("keys/$userName/public.pem", $publicKey);
        Storage::disk('local')->put("keys/$userName/private.pem", $privateKey);   

        $validatedData['public_key'] = $publicKey;
        $validatedData['private_key'] = $privateKey;

        User::create($validatedData);

        $responseData = [
            'message' => "Make sure you store you public and private keys securely for future use",
            'email' => $validatedData['email'],
            'public_key' => $publicKey,
            'private_key' => $privateKey
        ];

        return response()->json(["data" => $responseData], 400);
    }


}
