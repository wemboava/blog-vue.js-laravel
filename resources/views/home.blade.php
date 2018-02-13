@extends('layouts.app')

@section('content')
    <page size="8">
        <bread-crumb :list="{{$breadCrumpList}}"></bread-crumb>
        <panel title="DashBoard" color="blue">
            <div class="row">

                <div class="col-md-4">
                    <box amount="80" title="Artigos" url="{{route('artigos.index')}}" color="orange" icon="ion ion-pie-graph"></box>
                </div>
                <div class="col-md-4">
                    <box amount="80" title="Usuários" url="{{route('usuarios.index')}}" color="blue" icon="ion ion-person-stalker"></box>
                </div>
                <div class="col-md-4">
                    <box amount="80" title="Autores" url="#" color="red" icon="ion ion-person"></box>
                </div>
            </div>
        </panel>

    </page>

@endsection