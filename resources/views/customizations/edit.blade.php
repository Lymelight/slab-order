@extends('backapp')

@section('content')

    {!! Form::model($customization, ['method' => 'PATCH', 'action' => ['CustomizationController@update', $customization->id]]) !!}
        @include('errors.list')

        @include('customizations.form', ['submitButtonText' => 'Edit Customization'])
    {!! Form::close() !!}
@stop