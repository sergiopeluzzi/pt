@extends('app')

@section('content')

    <div class="container">
        <h3>Edit Client: {{ $client->id }}</h3>

        @include('errors.formerrors')

        {!! Form::model($client, ['route' => ['admin.clients.update', $client->id]]) !!}

        @include('admin.clients.form')

        <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-lg btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection