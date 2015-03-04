@extends('backapp')

@section('content')

    {!! Form::model($product, ['method' => 'PATCH', 'action' => ['ProductController@update', $product->id]]) !!}
        @include('errors.list')

        @include('menus.form', ['submitButtonText' => 'Edit Menu'])
    {!! Form::close() !!}
@stop