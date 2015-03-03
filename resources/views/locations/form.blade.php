<!-- Name Form Input -->
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Address1 Form Input -->
<div class="form-group">
    {!! Form::label('address1', 'Address1') !!}
    {!! Form::text('address1', null, ['class' => 'form-control']) !!}
</div>

<!-- Address2 Form Input -->
<div class="form-group">
    {!! Form::label('address2', 'Address2') !!}
    {!! Form::text('address2', null, ['class' => 'form-control']) !!}
</div>

<!-- Province Form Input -->
<div class="form-group">
    {!! Form::label('province', 'Province') !!}
    {!! Form::text('province', null, ['class' => 'form-control']) !!}
</div>

<!-- City Form Input -->
<div class="form-group">
    {!! Form::label('city', 'City') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Postal Form Input -->
<div class="form-group">
    {!! Form::label('postal', 'Postal') !!}
    {!! Form::text('postal', null, ['class' => 'form-control']) !!}
</div>

<!-- Open_hour Time Input -->
<div class="form-group">
    {!! Form::input('time', 'open_hour', null, ['class' => 'form-control']) !!}
</div>

<!-- Close_hour Time Input -->
<div class="form-group">
    {!! Form::input('time', 'close_hour', null, ['class' => 'form-control']) !!}
</div>

<!-- Form Submit Button -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
