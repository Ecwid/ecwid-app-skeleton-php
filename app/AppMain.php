<?php

namespace App;

class AppMain
{
    private $storeId;
    private $apiAccessToken;
    private $userLang;

    public function __construct($storeId, $apiAccessToken, $userLang)
    {
        $this->storeId = $storeId;
        $this->apiAccessToken = $apiAccessToken;
        $this->userLang = $userLang;
    }

    /*
     * Here goes your application business logic
     */
    public function doSomething() {
      //...
    }
}