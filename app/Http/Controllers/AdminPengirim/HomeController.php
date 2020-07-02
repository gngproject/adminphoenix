<?php

namespace App\Http\Controllers\AdminPengirim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('AdminPengirim.home');
    }
}
