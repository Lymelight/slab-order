{!! Form::open(['method' => 'PATCH', 'action' => ['MenuBuilderController@updateProducts', $menu->id]]) !!}

@include('errors.list')

<!-- Products Form Multiple Select -->
<div class="form-group">
    {!! Form::label('products', 'Products Available to Add to Menu') !!}
    {!! Form::select('products[]', $products, $products_selected, ['class' => 'form-control', 'multiple']) !!}
</div>

<!-- Form Submit Button -->
<div class="form-group">
    {!! Form::submit('Save Menu', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}