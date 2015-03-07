@extends('backapp')

@section('content')

    {!! Form::model($menu, ['method' => 'PATCH', 'action' => ['MenuController@update', $menu->id]]) !!}
        @include('errors.list')

        @include('menus.form', ['submitButtonText' => 'Edit Menu'])
    {!! Form::close() !!}
@stop