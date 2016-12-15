@extends('app')

@section('content')

    <div class="container">
        <h3>Transactions</h3>

        <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary btn-lg">New Transaction</a>

        <br><br>

        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>Id</th>
                <th>From</th>
                <th>To</th>
                <th>History</th>
                <th>Value</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->clientFrom->user->name }}</td>
                    <td>{{ $transaction->clientTo->user->name }}</td>
                    <td>{{ $transaction->history }}</td>
                    <td>{{ $transaction->value }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $transactions->render() !!}

    </div>

@endsection