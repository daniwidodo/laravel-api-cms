<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Xendit\Xendit;

class XenditServiceProvider extends ServiceProvider
{

    function __construct()
    {
        Xendit::setApiKey(env('XENDIT_API_KEY'));
    }

    public function createInvoice($args)
    {
        // $date = new \DateTime();
        // $redirectUrl = '';
        // $defParams = [
        //     'external_id' => 'lar8-checkout-demo-' . $date->getTimestamp(),
        //     'payer_email' => 'invoice+demo@xendit.co', 
        //     'description' => 'Laravel 8 Checkout Demo', 
        //     'failure_redirect_url' => $redirectUrl, 
        //     'success_redirect_url' => $redirectUrl
        // ];

        // $data = json_decode(json_encode($args), true);
        // // $defParams['failure_redirect_url'] = $data['redirect_url'];
        // // $defParams['success_redirect_url'] = $data['redirect_url'];
        // $params = array_merge($defParams, $data);
        // $response = [];

        $params = [
            'external_id' => 'demo_147580196270',
            'payer_email' => 'sample_email@xendit.co',
            'description' => 'Trip to Bali',
            'amount' => 32000,
            'for-user-id' => '5c2323c67d6d305ac433ba20'
        ];

        try {
            $response = \Xendit\Invoice::create($params);
        } catch (\Throwable $e) {
            $response['message'] = $e->getMessage();
        }

        logger($response);
        // return $response;
        return [$params, $args, env('XENDIT_API_KEY'), $response]; // NEED RESOLVE return Xen platform relationship not found error
    }

    // /**
    //  * Register services.
    //  *
    //  * @return void
    //  */
    // public function register()
    // {
    //     //
    // }

    // /**
    //  * Bootstrap services.
    //  *
    //  * @return void
    //  */
    // public function boot()
    // {
    //     //
    // }

}
