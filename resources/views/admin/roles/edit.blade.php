@extends('app')

@section('content')

    <div class="container">
        <h3>Edit Role: {{ $role->id }}</h3>

        @include('errors.formerrors')

        {!! Form::model($role, ['route' => ['admin.roles.update', $role->id]]) !!}

        @include('admin.roles.form')

        <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-lg btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection