<div class="form-group">
    {!! Form::label('from', 'From:') !!}
    {!! Form::text('from', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('to', 'To:') !!}
    {!! Form::text('to', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('history', 'History:') !!}
    {!! Form::textarea('history', null, ['class' => 'form-control']) !!}
</div>