@extends('app')

@section('content')

    <div class="container">
        <h3>Roles</h3>

        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-lg">New Role</a>

        <br><br>

        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('admin.roles.edit', ['id' => $role->id]) }}" class="btn btn-default btn-sm">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $roles->render() !!}

    </div>

@endsection