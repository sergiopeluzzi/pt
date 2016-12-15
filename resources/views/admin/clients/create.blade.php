@extends('app')

@section('content')

    <div class="container">
        <h3>New Client</h3>

        @include('errors.formerrors')

        {!! Form::open(['route' => 'admin.clients.store']) !!}

        @include('admin.clients.form')

        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-lg btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection