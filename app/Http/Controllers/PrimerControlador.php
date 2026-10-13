<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerControlador extends Controller
{
    public function index(){
        $posts=['post1','post2'];
        return view('contact', compact('posts'));
    }
    
    public function otro($post){
        echo $post;
    }
}