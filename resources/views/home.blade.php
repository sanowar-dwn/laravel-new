@extends('layouts.dashboard')

@section('content')
        @if (session('delete'))
        <div class="alert alert-danger">{{ session('delete') }}</div>            
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Hey <strong>{{ $logged_user }}</strong> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <table class="table table-striped">
                        <tr>
                            <td>Sl</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Created At</td>
                            <td>Action</td>
                        </tr>


                        @foreach ($all_users as $key => $user )
                            <tr>
                                <td>{{ $all_users->firstitem()+$key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td><a href="{{ Route('user.delete', $user->id) }}" class="btn btn-danger">DELETE</a></td>
                            </tr>
                        @endforeach

                    </table>
                    {{ $all_users->links() }}
                </div>
            </div>
        </div>
@endsection
