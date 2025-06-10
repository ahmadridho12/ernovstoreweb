<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SeoHelper;
class FaqController extends Controller
{
    //
    public function index( Request $request )
    {
        SeoHelper::faq(); // Aktifkan SEO untuk halaman FAQ
        return view('home.faq');
    }
}
