@extends('app')

@section('content')

    <div class="container">

        @include('errors.formerrors')

        <div class="container text-center">
            <h3>My QR</h3>
            {!! Form::open(['route' => 'client.readqr.store','class' => 'form']) !!}


            {!! FOrm::close() !!}
        </div>


    </div>


@endsection