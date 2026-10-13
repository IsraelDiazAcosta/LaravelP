<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SegundoControlador extends Controller
{
    public function index(){
        return view('contact1', ['name2'=>'Pablo']);
    }
}
