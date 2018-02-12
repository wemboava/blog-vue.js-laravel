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

        <panel title="Lista de Artigos">
            <bread-crumb :list="{{$breadCrumpList}}"></bread-crumb>
            <list-table 
                :titles="['#', 'Title', 'Description']"
                :items="{{$articlesList}}"
                create="#criar"
                details="#detalhe"
                edit="#editar"
                deletes="#deletar"
                token="4987234972394792387"
                modal="yes"
            ></list-table>
        </panel>

        <modal name="modalAdd" title="Add product">
            <form-template
                id="formAdd"
                css=""
                action="{{ route('artigos.store') }}"
                method="post"
                enctype=""
                token="{{ csrf_token() }}"
            >
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="description" value="{{old('description')}}">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="content" class="form-control" name="content" id="content">{{old('content')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="datetime-local" class="form-control" name="date" id="date" value="{{old('date')}}">
                </div>
            </form-template>
            <span slot="actions">
                <button form="formAdd" class="btn btn-info">Confirm</button>
            </span>
        </modal>
        
        <modal name="modalEdit" title="Edit product">
            <form-template
                id="editForm"
                css=""
                action=""
                method="post"
                enctype=""
                token=""
            >
                <div class="form-group">
                    <label for="title">Title:</label>
                    <!-- <input type="text" class="form-control" id="title" v-model="$store.state.item.title" placeholder="title"> -->
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <!-- <input type="text" class="form-control" id="description" v-model="$store.state.item.description" placeholder="description"> -->
                </div>
            </form-template>
            <span slot="actions">
                <button form="editForm"class="btn btn-info">Confirm</button>
            </span>
        </modal>
        <!-- <modal name="modalDetails" :title="$store.state.item.title">
            <p>@{{$store.state.item.description}}</p>        
        </modal> -->

    </page>

@endsection