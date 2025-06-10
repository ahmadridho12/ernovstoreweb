<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SeoHelper;

class ShippingController extends Controller
{
    //
    public function index( Request $request )
    {
        SeoHelper::shipping(); // aktifkan SEO untuk halaman shipping
        return view('home.shippinginfo');
    }
}
