<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // json_encode transforma o atributo em Json, para enviar para a view
        $breadCrumpList =  json_encode([
            ['title'=>'Home', 'url'=>route('home')],
            ['title'=>'list of articles', 'url'=>'']
        ]);

        $articlesList =  json_encode([
            ['id'=>1, 'title'=>'PHP 5', 'description'=>'Curso legal de PHP 5'],
            ['id'=>2, 'title'=>'Vue.js', 'description'=>'Curso completo de vue.js']
        ]);

        //compact é uma funçao do laravel que disponibiliza o valor da variavel para a view
        return view('admin.artigos.index', compact('breadCrumpList', 'articlesList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
