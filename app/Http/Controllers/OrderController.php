<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SeoHelper;

class OrderController extends Controller
{
    //
    public function index( Request $request )
    {
        SeoHelper::order(); // aktifkan SEO untuk halaman ini

        return view('home.order');
    }
}
