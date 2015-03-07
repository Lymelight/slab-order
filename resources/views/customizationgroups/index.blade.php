@extends('backapp')

@section('content')

    <h1> Customization Groups: </h1>
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
                        # of Customizations Associated
                    </td>
                    <td>
                        # of Products Associated
                    </td>
                    <td>

                    </td>
                </tr>
            </thead>
        @forelse($customization_groups as $customization_group)
            <tr>
                <td>
                    {{ $customization_group['name'] }}
                </td>
                <td>
                    {{ $customization_group['price'] }}
                </td>
                <td>
                    Customizations.#
                </td>
                <td>
                    Products.Assc.#
                </td>
                <td>
                    <a href="{{ action('CustomizationGroupController@edit', [$customization_group->id]) }}">Edit</a>
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

    <h3>Add New Customization Group:</h3>
    {!! Form::open(['url' => '/business/customization_groups']) !!}
        @include('errors.list')

        @include('customizationgroups.form', ['submitButtonText' => 'Add Group'])

    {!! Form::close() !!}

@stop