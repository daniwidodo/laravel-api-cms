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

        // /**
    //  * Register services.
    //  *
    //  * @return void
    //  */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    
    public function createInvoice($args)
    {
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



}
