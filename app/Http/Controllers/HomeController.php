<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // json_encode transforma o atributo em Json, para enviar para a view
        $breadCrumpList =  json_encode([
            ['title'=>'Home', 'url'=>'']
        ]);
        //compact é uma funçao do laravel que disponibiliza o valor da variavel para a view
        return view('home', compact('breadCrumpList'));
    }
}
