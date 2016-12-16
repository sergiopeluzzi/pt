@extends('app')

@section('content')

    <div class="container">

        @include('errors.formerrors')

        <div class="container text-center">
            <h3>My transactions</h3>
            <h4>Balance: {{ auth()->user()->client->balance }}</h4>
        </div>
        <div class="container">
            <h4>Paid</h4>
            <table class="table">
                <thead>
                    <th>Id</th>
                    <th>To</th>
                    <th>Value</th>
                    <th>History</th>
                    <th>Date</th>
                </thead>
                <tbody>
                @foreach($transactionsPaid as $tp)
                    <tr>
                        <td>{{ $tp->id }}</td>
                        <td>{{ $tp->clientTo->user->name }}</td>
                        <td>{{ $tp->value }}</td>
                        <td>{{ $tp->history }}</td>
                        <td>{{ $tp->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="container">
            <h4>Received</h4>
            <table class="table">
                <thead>
                <th>Id</th>
                <th>From</th>
                <th>Value</th>
                <th>Date</th>
                </thead>
                <tbody>
                @foreach($transactionsReceived as $tr)
                    <tr>
                        <td>{{ $tr->id }}</td>
                        <td>{{ $tr->clientFrom->user->name }}</td>
                        <td>{{ $tr->value }}</td>
                        <td>{{ $tr->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>


@endsection