@extends('layouts.main')
@section('content')
    <div class="wrapper-typing-text">
        <div class="typing-text-welcome">
            Welcome Analogians
        </div>
    </div>
    <div class="wrapper wrapper--w790">
        <div class="row">
            <div class="col-sm-6 mt-4">
                <div class="card p-6">
                    <div class="card-body text-center">
                        <h5 class="card-title">New to Analogue Family?</h5>
                        <p class="card-text">Tell us about yourself</p>
                        <a href="{{route('users.create')}}" class="btn btn-primary btn-sm mt-2">Start Journey</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mt-4">
                <div class="card p-6">
                    <div class="card-body text-center">
                        <h5 class="card-title">Our Teams</h5>
                        <p class="card-text mt-2">We are diverse, innovative and crazy.</p>
                        <a href="{{route('users.index')}}" class="btn btn-primary mt-2">Explore People</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
