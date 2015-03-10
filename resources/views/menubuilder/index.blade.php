@extends('backapp')

@section('content')

    <h1>Menu Builder</h1>
    <table class="table table-striped">
        @forelse($menus as $menu)
            <div class="component">
                <div class="row">
                    <b>{{ $menu['name'] }}</b>
                    <a href="{{ action('MenuBuilderController@editMenu', [$menu->id]) }}" class="btn btn-success" style="float: right;">Build Menu</a>
                </div>
               <div class="row">
                   <p>Active at {{ $menu['location_count'] }} locations, contains {{ $menu['product_count'] }} products</p>
               </div>
            </div>
        @empty
            <span>No menus to display</span>
        @endforelse

        </tbody>
    </table>

@stop

@section('sidebar')


@stop
