{!! Form::model($product, ['method' => 'PATCH', 'action' => ['ProductController@update', $product->id]]) !!}

@include('errors.list')

<!-- Product Form Select -->
<div class="form-group">
    {!! Form::label('product', 'Add a New Product') !!}
    {!! Form::select('product', ['defaults'], null, ['class' => 'form-control']) !!}

    <!-- Form Submit Button -->
    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>

{!! Form::close() !!}


