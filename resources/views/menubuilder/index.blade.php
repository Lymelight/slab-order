@extends('backapp')

@section('content')

    <h1>Menu Builder</h1>
    <table class="table table-striped">
        @forelse($menus as $menu)
            <div class="component">
                {{ $menu['name'] }}
                {{ $menu['location_count'] }}
                <a href="{{ action('MenuBuilderController@edit', [$menu->id]) }}">Edit</a>
            </div>
        @empty
            <span>No menus to display</span>
        @endforelse

        </tbody>
    </table>

@stop

@section('sidebar')


@stop
