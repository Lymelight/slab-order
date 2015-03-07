@extends('backapp')

@section('content')

    <h1>Menu Builder</h1>
    <table class="table table-striped">
        @forelse($menus as $menu)
            <div class="component">
                {{ $menu['name'] }}
                {{ $menu['location_count'] }}
                <a href="{{ action('MenuController@edit', [$menu->id]) }}">Edit</a>
                <div class="row">
                    Add a product:
                    <select name="addproduct" id="addproduct">
                        <option value="1">Test</option>
                    </select>
                    <button>
                        <i class="fa fa-plus"></i>
                    </button>
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
