<!-- Name Form Input -->
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Price Form Input -->
<div class="form-group">
    {!! Form::label('price', 'Price') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Customization_groups Form Multiple Select -->
<div class="form-group">
    {!! Form::label('customization_groups', 'Customization Groups') !!}
    {!! Form::select('customization_groups[]', $customization_groups, $customization_groups_selected, ['class' => 'form-control', 'multiple']) !!}
</div>

<!-- Form Submit Button -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
