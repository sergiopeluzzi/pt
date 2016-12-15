@extends('app')

@section('content')

    <div class="container">
        <h3>Clients</h3>

        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary btn-lg">New Client</a>

        <br><br>

        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Code</th>
                <th>Email</th>
                <th>Balance</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->user->name }}</td>
                    <td>{{ $client->code }}</td>
                    <td>{{ $client->user->email }}</td>
                    <td>{{ $client->balance }}</td>
                    <td>
                        <a href="{{ route('admin.clients.edit', ['id' => $client->id]) }}" class="btn btn-default btn-sm">Edit</a>
                        <a href="{{ route('admin.clients.destroy', ['id' => $client->id]) }}" class="btn btn-default btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $clients->render() !!}

    </div>

@endsection