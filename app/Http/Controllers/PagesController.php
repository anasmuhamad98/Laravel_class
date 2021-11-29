<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages/index');
    }

    public function total($num1,$num2)
    {
        $sum = $num1 + $num2;
        return $sum;
    }
}
