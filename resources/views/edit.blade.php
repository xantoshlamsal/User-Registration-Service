@extends('layouts.main')
@section('content')
    <div class="wrapper wrapper--w790">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">Edit User Information</h2>
            </div>
            <div class="card-body">
                <form id="registration" method="POST" action="{{route('users.update', $user['id'])}}">
                    @method('PUT')
                    @csrf
                    <div class="form-row m-b-55">
                        <div class="name">Name</div>
                        <div class="value">
                            <div class="row row-space">
                                <div class="col">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="first_name" value="{{$user['first_name']}}" required>
                                        <label class="label--desc">first name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="last_name" value="{{$user['last_name']}}" required>
                                        <label class="label--desc">last name</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Gender</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="gender" required>
                                        <option value="">Choose option</option>
                                        <option value="male" {{($user['gender']=='male')?'selected':''}}>Male</option>
                                        <option value="female" {{($user['gender']=='female')?'selected':''}}>Female</option>
                                        <option value="others" {{($user['gender']=='others')?'selected':''}}>Others</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Phone</div>
                        <div class="value">
                            <div class="row row-refine">
                                <div class="col-3">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="area_code" value="{{$user['area_code']}}"  required>
                                        <label class="label--desc">Area Code</label>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" id="phone_number" type="number" name="phone" value="{{$user['phone']}}" maxlength="10" minlength="9" min="0" required>
                                        <label class="label--desc">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Email</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="email" name="email" value="{{$user['email']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Address</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="address" value="{{$user['address']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Nationality</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="nationality" required>
                                        <option value="">Choose option</option>
                                        <option value="nepali" {{($user['nationality']=='nepali')?'selected':''}}>Nepali</option>
                                        <option value="others" {{($user['nationality']=='others')?'selected':''}}>Others</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Highest Education</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="education" value="{{$user['education']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">DOB</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="date" name="dob" value="{{$user['dob']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Prefered Mode of Contact</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="preferred_contact" required>
                                        <option selected="selected" value="">Choose option</option>
                                        <option value="phone" {{($user['preferred_contact']=='phone')?'selected':''}}>Phone</option>
                                        <option value="email" {{($user['preferred_contact']=='email')?'selected':''}}>Email</option>
                                        <option value="none" {{($user['preferred_contact']=='none')?'selected':''}}>None</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn--radius-2 btn--blue" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#registration').validate();

    </script>
    <style>
        .error{
            color: red;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
        #phone_number {
            -moz-appearance: textfield;
        }
    </style>
@endsection
