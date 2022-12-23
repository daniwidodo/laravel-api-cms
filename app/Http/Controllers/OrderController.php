<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\XenditServiceProvider as Service;
class OrderController extends Controller
{
    //
    public function createInvoice(Request $request) {

        $service = new Service();

        return $service->createInvoice($request->all());
    }
}
