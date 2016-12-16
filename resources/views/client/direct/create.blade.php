@extends('app')

@section('content')

    <div class="container">

        @include('errors.formerrors')

        <div class="container text-center">
            <h3>Direct</h3>
            {!! Form::open(['route' => 'client.direct.store','class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label('code', 'Code:') !!}
                {!! Form::text('code', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <h5>Nome</h5>
            </div>

            <div class="form-group">
                {!! Form::label('value', 'Value:') !!}
                {!! Form::text('value', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-lg btn-primary']) !!}
            </div>

            {!! FOrm::close() !!}
        </div>


    </div>


@endsection