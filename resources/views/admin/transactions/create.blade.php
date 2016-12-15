@extends('app')

@section('content')

    <div class="container">
        <h3>New Transaction</h3>

        @include('errors.formerrors')

        {!! Form::open(['route' => 'admin.transactions.store']) !!}

        @include('admin.transactions.form')

        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-lg btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection