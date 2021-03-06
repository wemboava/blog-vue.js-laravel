<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// import model artigo
use App\Article;

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

        $articlesList = Article::select('id', 'title', 'description', 'date')->paginate(2);

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
        $data = $request->all();

        $validation = \Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'date' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        };

        // dd($request->all());
        $data = $request->all();
        Article::create($data);

        //redireciona para a pagina da requisicao
        return redirect()->back();

        //caso eu não tivesse o arquivo fillable, teria que fazer da seguinte forma
        // $artigo = new Artigo;
        // $artigo->titulo = $data['title']
        // ...
        //$artigo->save()
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Article::find($id);
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
        $data = $request->all();

        $validation = \Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'date' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        };

        // dd($request->all());
        Article::find($id)->update($data);

        //redireciona para a pagina da requisicao
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back();
    }
}
