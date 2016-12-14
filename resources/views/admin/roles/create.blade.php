@extends('app')

@section('content')

    <div class="container">
        <h3>New Role</h3>

        @include('errors.formerrors')

        {!! Form::open(['route' => 'admin.roles.store']) !!}

        @include('admin.roles.form')

        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-lg btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection