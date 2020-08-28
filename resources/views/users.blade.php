@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Active</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($users)
                                @foreach($users as $user)
                                    <tr>

                                        <td scope="row">{{ $user['id'] }}</td>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>{{ $user['active'] }}</td>
                                        <td><a href="{{ route('profile', ['id' => $user['id']]) }}" class="btn-link"> {{ __
                                        ('edit') }}</a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        {{ $users->render() }}
                                    </td>
                                </tr>
                            @else

                                <tr>
                                    <td>No users</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
