<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EcwidApi\EcwidPayload;
use App\AppMain;

class EmbeddedAppController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | App home page controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for displaying the app page inside
    | Ecwid Control Panel . 
    |
    */

    /**
     * Create a new embedded app controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function home(Request $request) 
    {
        // Decrypt embedded app payload
        $ecwidPayload = new EcwidPayload();
        $payloadDecrypted = $ecwidPayload->getEcwidPayload($request->input('payload'));

        // Get the payload data
        $storeId = $payloadDecrypted['store_id'];
        $apiAccessToken = $payloadDecrypted['access_token'];
        $userLang = $payloadDecrypted['lang'];

        // Perform app business logic
        $appMain = new AppMain($storeId, $apiAccessToken, $userLang);

        // Display the app home screen
        return view(
            'embedded.home', 
            [
                'storeId' => $storeId,
                'apiAccessToken' => $apiAccessToken,
                'userLang' => $userLang,
                'appNamespace' => \Config::get('app.ecwid_app_namespace')
            ]
        );
    }
}
