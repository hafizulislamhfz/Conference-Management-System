@extends('Authh.layouts.default')

@section('login')
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                        <img src="https://th.bing.com/th/id/OIP.WO_QR87agyX1RpD_c6ipWwHaE8?w=247&h=180&c=7&r=0&o=5&dpr=1.25&pid=1.7" class="logo">
                    </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                        <img src="https://thumbs.dreamstime.com/b/interior-conference-room-white-projector-board-meeting-boardroom-classroom-office-61537593.jpg" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row px-3 mb-4">
                        <div class="line"></div>
                        <small class="or text-center">Login</small>
                        <div class="line"></div>
                    </div>
                    <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                        <div class="row px-3 mt-2">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Email Address</h6></label>
                            <input class="mb-3" type="text" name="email" placeholder="Enter a valid email address" value="{{ old('email') }}" required>
                        </div>
                        <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                            <input type="password" name="password" placeholder="Enter password" required>
                        </div>
                        <div class="row px-3 mb-1">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input id="remember_me" type="checkbox" name="remember" class="custom-control-input"  checked>
                                <label for="chk1" class="custom-control-label text-sm">Remember me</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                        </div>
                        <div class="mt-2 mb-2">
                            @if($errors->any())
                                <span class="badge text-danger">{{$errors->first()}}</span>
                            @endif
                        </div>
                        <div class="row mb-3 px-3">
                            <button type="submit" class="btn btn-blue text-center mr-5">Login</button>
                            <a type="button" class="btn btn-success text-white ml-5" href="{{ url('') }}">Current Conferences</a>
                        </div>
                    </form>
                    <div class="row mb-4 px-3">
                        <small class="font-weight-bold">Don't have an account? <a class="text-info" href="{{ url('register') }}">Register</a></small>
                    </div>
                    <div class="row mb-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
