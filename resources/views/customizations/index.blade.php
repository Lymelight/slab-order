@extends('backapp')

@section('content')

    <h1> Customizations: </h1>
    <table class="table table-striped">
        <tbody>
            <thead>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        Price
                    </td>
                    <td>

                    </td>
                </tr>
            </thead>
        @forelse($customizations as $customization)
            <tr>
                <td>
                    {{ $customization['name'] }}
                </td>
                <td>
                    {{ $customization['price'] }}
                </td>
                <td>
                    <a href="{{ action('CustomizationController@edit', [$customization->id]) }}">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <th>No records to display</th>
            </tr>
        @endforelse
        </tbody>
    </table>

@stop

@section('sidebar')

    <h3>Add New Customization:</h3>
    {!! Form::open(['url' => '/business/customizationgroups']) !!}
        @include('errors.list')

        @include('customizations.form', ['submitButtonText' => 'Add Customization'])
    {!! Form::close() !!}

@stop