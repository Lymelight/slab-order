@extends('backapp')

@section('content')

    <h1>Menus</h1>
    <table class="table table-striped">
        <tbody>
            <thead>
            <tr>
                <td>
                    Menu Name
                </td>
                <td>
                    Categories
                </td>
                <td>
                    Products
                </td>
                <td>
                    Locations
                </td>
                <td>

                </td>
            </tr>
            </thead>
        @forelse($menus as $menu)
            <tr>
                <td>
                    <a href="{{action('MenuBuilderController@editMenu', [$menu->id])}}">{{ $menu['name'] }}</a>
                </td>
                <td>
                    {{ $menu['category_count'] }}
                </td>
                <td>
                    {{ $menu['product_count'] }}
                </td>
                <td>
                    {{ $menu['location_count'] }}
                </td>
                <td>
                    <a href="{{ action('MenuController@edit', [$menu->id]) }}">Edit</a>
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

    <h3>Create a Menu:</h3>
    {!! Form::open(['url' => '/business/menus']) !!}
    @include('errors.list')

    @include('menus.form', ['submitButtonText' => 'Add Menu'])

    {!! Form::close() !!}

@stop
