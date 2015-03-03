@extends('backapp')

@section('content')

    <h1> Locations: </h1>
    <table class="table table-striped">
        <tbody>
            <thead>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        Address
                    </td>
                    <td>
                        Locale
                    </td>
                    <td>
                        Status
                    </td>
                    <td>

                    </td>
                </tr>
            </thead>
        @forelse($locations as $location)
            <tr>
                <td>
                    {{ $location['name'] }}
                </td>
                <td>
                    {{ $location['address1'] }}
                </td>
                <td>
                    {{ $location['city'] }}, {{$location['province']}}
                </td>
                <td>
                    Open?
                </td>
                <td>
                    <a href="{{ action('LocationController@edit', [$location->id]) }}">Edit</a>
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

    <h3>Add a New Location:</h3>
    {!! Form::open(['url' => '/business/locations']) !!}
        @include('errors.list')

        @include('locations.form', ['submitButtonText' => 'Add Location'])

    {!! Form::close() !!}

@stop