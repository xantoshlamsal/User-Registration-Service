@extends('layouts.main')
@section('content')
    <div class="wrapper" style="width: 1400px">

        @if(isset($message))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h5 class="alert-heading"><strong>{{($success)?"Success":"Error"}}</strong></h5>
                <p>{{$message}}</p>
                <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        @endif
        <p class="text-center text-white mb-2" style="font-size: 24pt; font-weight: bold">List of Users</p>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-striped table-sm" style="width: 100%; align-content: center">
                        <thead class="font-weight-bold">
                        <tr>
                            <td>SN</td>
                            <td>Full Name</td>
                            <td>Gender</td>
                            <td>Phone</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>Nationality</td>
                            <td>Education</td>
                            <td>DOB</td>
                            <td>Preferred Contact</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$user['first_name']}} {{$user['last_name']}}</td>
                                <td>{{$user['gender']}}</td>
                                <td>{{$user['area_code']}}-{{$user['phone']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user['address']}}</td>
                                <td>{{$user['nationality']}}</td>
                                <td>{{$user['education']}}</td>
                                <td>{{$user['dob']}}</td>
                                <td>{{$user['preferred_contact']}}</td>
                                <td>
                                    <form method="post" action="{{route('users.destroy', $user['id'])}}" style="display: inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <a class="btn-primary btn-sm" href="{{route('users.edit', $user['id'])}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
