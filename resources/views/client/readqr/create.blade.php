@extends('app')

@section('content')

    <div class="container">

        @include('errors.formerrors')

        <div class="container text-center">
            <h3>Read QR</h3>
            {!! Form::open(['route' => 'client.readqr.store', 'class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label('code', 'Code:') !!}
                {!! Form::text('code', null, ['class' => 'form-control', 'disabled']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('value', 'Value:') !!}
                {!! Form::text('value', null, ['class' => 'form-control', 'disabled']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-lg btn-primary']) !!}
                <a href="#" class="btn btn-lg btn-primary">Read QR Code</a>
            </div>

            {!! FOrm::close() !!}
        </div>


    </div>


@endsection