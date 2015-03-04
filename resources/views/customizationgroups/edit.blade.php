@extends('backapp')

@section('content')

    {!! Form::model($customization_group, ['method' => 'PATCH', 'action' => ['CustomizationGroupController@update', $customization_group->id]]) !!}
        @include('errors.list')

        @include('customizationgroups.form', ['submitButtonText' => 'Edit Group'])
    {!! Form::close() !!}
@stop