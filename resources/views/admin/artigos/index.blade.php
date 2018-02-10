@extends('layouts.app')

@section('content')
    <page size="10">
        
        <panel title="Lista de Artigos">
            <bread-crumb :list="{{$breadCrumpList}}"></bread-crumb>
            <list-table 
                :titles="['#', 'Title', 'Description']"
                :items="[['1', 'PHP OO', 'Curso de PHP OO'], ['2', 'VueJs', 'Curso de VueJs']]"
                create="#criar"
                details="#detalhe"
                edit="#editar"
                deletes="#deletar"
                token="4987234972394792387"
            ></list-table>
        </panel>

    </page>

@endsection