@extends('backapp')

@section('content')

    {!! Form::model($location, ['method' => 'PATCH', 'action' => ['LocationController@update', $location->id]]) !!}
        @include('errors.list')

        @include('locations.form', ['submitButtonText' => 'Edit Location'])
    {!! Form::close() !!}
@stop