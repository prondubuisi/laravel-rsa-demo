<?php

namespace App\Libraries;

use \Pikirasa\RSA as RSA;


Class RSACrypt extends RSA {
    public $rsa; 
    
    public function __construct($publicKey, $privateKey) 
    {
        $this->rsa = new RSA($publicKey, $privateKey);
        
    }

    public function generatePublicAndPrivateKeys()
    {
        $this->rsa->create();

        return [
            "public_key" => $this->rsa->getPublicKeyFile(),
            "private_key" => $this->rsa->getPrivateKeyFile()
        ];
         
    }
    
    public function encrypt($data)
    {
        return $this->rsa->encrypt($data);
    }
    
    public function decrypt($encryptedData)
    {
        return $this->rsa->decrypt($encryptedData);
    }
    


}