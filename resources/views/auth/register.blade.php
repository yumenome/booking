@extends('layout.app')
@section('content')
<div style="display: flex;align-items: center; justify-content: center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('register') }}" method="post">
                @csrf
                <h3 class="text-center text-dark">Register</h3>
                <div class="form-group">
                    <label for="name" class="text-dark">Name:</label><br>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('name')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <label for="confirm-password" class="text-dark">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
                </div>
                <div style="display: flex;align-items: center; justify-content: space-evenly">
                    <div class="form-group mt-3">
                        <label for="gender" class="text-dark">Gender:</label><br>
                        <label for="male">Male</label>
                        <input type="radio" id="male" name="gender" value="male">

                        <label for="female">Female</label>
                        <input type="radio" id="female" name="gender" value="female">

                        <label for="other">Other</label>
                        <input type="radio" id="other" name="gender" value="other">
                    </div>

                    <div class="form-group mt-3">
                        <label for="is_doctor">A DOCTOR?:</label>
                        <div class="form-check form-switch col-md-4">
                            <input class="form-check-input" type="checkbox" name="is_doctor" >
                        </div>
                    </div>
                </div>


                <div class="d-flex" style="align-items: center;justify-content: space-around;">
                    <div class="form-group">
                        <label for="remember-me" class="text-dark"></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                    </div>
                    <div class="text-right mt-2">
                        <a href="/login" class="text-dark">Login here</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
