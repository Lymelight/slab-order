@extends('backapp')

@section('content')

    {!! Form::model($product, ['method' => 'PATCH', 'action' => ['ProductController@update', $product->id]]) !!}
        @include('errors.list')

        @include('products.form', ['submitButtonText' => 'Edit Product'])
    {!! Form::close() !!}
@stop