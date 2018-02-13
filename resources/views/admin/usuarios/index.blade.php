@extends('layouts.app')

@section('content')
    <page size="10">
        
        @if($errors->all())
            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="false">&times;</span>
                </button>
                @foreach ($errors->all() as $key => $values)
                <li><strong>{{$values}}</strong></li>
                @endforeach
            </div>
        @endif

        <panel title="Lista de Usuarios">
            <bread-crumb :list="{{$breadCrumpList}}"></bread-crumb>
            <list-table 
                :titles="['ID', 'Name', 'Email']"
                :items="{{json_encode($modelList)}}"
                create="#criar"
                details="/admin/usuarios/"
                edit="/admin/usuarios/"
                deletes="/admin/usuarios/"
                token="{{ csrf_token() }}"
                modal="yes"
            ></list-table>
        <div align="center">
            {{$modelList}}
        </div>
        </panel>

        <modal name="modalAdd" title="Add users">
            <form-template
                id="formAdd"
                css=""
                action="{{ route('usuarios.store') }}"
                method="post"
                enctype=""
                token="{{ csrf_token() }}"
            >
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
                </div>
            </form-template>
            <span slot="actions">
                <button form="formAdd" class="btn btn-info">Confirm</button>
            </span>
        </modal>
        
        <modal name="modalEdit" title="Edit user">
            <form-template
                id="editForm"
                css=""
                :action="'/admin/usuarios/' + $store.state.item.id"
                method="put"
                enctype=""
                token="{{ csrf_token() }}"
            >
                <div class="form-group">
                    <label for="name">name:</label>
                    <input type="text" class="form-control" name="name" v-model="$store.state.item.name" placeholder="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" v-model="$store.state.item.email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                </div>
            </form-template>
            <span slot="actions">
                <button form="editForm"class="btn btn-info">Confirm</button>
            </span>
        </modal>
        <modal name="modalDetails" :title="$store.state.item.name">
            <p>@{{$store.state.item.email}}</p>        
        </modal>

    </page>

@endsection