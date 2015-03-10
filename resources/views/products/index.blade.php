@extends('backapp')

@section('content')

    <h1>Products</h1>
    <table class="table table-striped">
        <tbody>
            <thead>
            <tr>
                <td>
                    Product Name
                </td>
                <td>
                    Price
                </td>
                <td>
                    Assc. Customization Groups
                </td>
                <td>

                </td>
            </tr>
            </thead>
        @forelse($products as $product)
            <tr>
                <td>
                    {{ $product['name'] }}
                </td>
                <td>
                    {{ money_format("%i", $product['price']) }}
                </td>
                <td>
                    @foreach($product->customizationGroups as $customization_group)
                        <a href="{{ action('CustomizationGroupController@edit', [$customization_group->id]) }}">{{$customization_group['name']}}</a>
                    @endforeach
                </td>
                <td>
                    <a href="{{ action('ProductController@edit', [$product->id]) }}">Edit</a>
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

    <h3>Create a Product</h3>
    {!! Form::open(['url' => '/business/products']) !!}
    @include('errors.list')

    @include('products.form', ['submitButtonText' => 'Add Product'])

    {!! Form::close() !!}

@stop
