<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisma;

class HomeController extends Controller
{
    public function index() {
        $wisma = Wisma::get();
        return view('pages.home');
    }
}
