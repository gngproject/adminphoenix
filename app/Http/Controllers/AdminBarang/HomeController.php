<?php

namespace App\Http\Controllers\AdminBarang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('AdminBarang.Home');
    }
}
