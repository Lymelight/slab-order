@extends('backapp')

@section('content')

        @include('errors.list')

        <h1>{{$menu['name']}}</h1>

        @if($menu_products)
            <h2>Products:</h2>
        @endif

        @forelse($menu_products as $menu_product)

            <div class="component">
                <h3>{{ $menu_product['name'] }}</h3>

                <h4>Customization Groups:</h4>
                @forelse($menu_product->customizationGroups as $customization_group)

                    <h5> {{$customization_group['name']}} - Price: {{ money_format("%i", $customization_group['price'])}}</h5>
                    <ul>
                        @forelse($customization_group->customizations as $customization)
                            <li>

                                {{$customization['name']}}
                                @if($customization['price'] > 0)
                                    - Add: {{ money_format("%i", $customization['price'])}}
                                @endif

                            </li>
                        @empty
                            No customizations in the Customization Group!
                        @endforelse
                    </ul>
                @empty
                    Product has no Customization Groups added!
                @endforelse
            </div>

        @empty

            <div class="component">
                No products are currently in this menu!
            </div>

        @endforelse

        @include('menubuilder.buildform')

@stop

@section('sidebar')



@stop