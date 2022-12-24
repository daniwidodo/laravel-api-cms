<?php

namespace App\Http\Controllers;

use App\Providers\MidtransServiceProvider;
use Illuminate\Http\Request;
use App\Providers\XenditServiceProvider;
class OrderController extends Controller
{
    public function XenditCreateInvoice(Request $request) {

        $service = new XenditServiceProvider();
        return $service->createInvoice($request->all());
    }
    public function MidtransCreateInvoice(Request $request) {

        $service = new MidtransServiceProvider();
        return $service->createInvoice($request->all());
    }

    public function MidtransCreateSnapInvoice(Request $request) {

        $service = new MidtransServiceProvider();
        return $service->createSnapInvoice($request->all());
    }
}
