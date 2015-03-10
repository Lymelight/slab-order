@extends('backapp')

@section('content')
    @include('products.form', ['submitButtonText' => 'Edit Product'])
@stop