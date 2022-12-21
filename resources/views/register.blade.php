@extends('layouts.authtemplate')

@section('title', 'Register')

@section('content')


    
            <form action="/register" method="post" class="col-sm-4 custom-form">
                    @csrf
                    <h1 class="h3 my-4 fw-normal login-font text-center ">REGISTER</h1>

                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <input type="hidden" value="2" name="role_id">
                    <div class="form-floating login-register-form">
                        <input type="text" name="name" class="form-control form-color" id="name" placeholder="name" required value="{{ old('name') }}">
                        <label for="email">Name</label>
                    </div>
                    <div class="form-floating login-register-form">
                        <input type="email" name="email" class="form-control form-color" id="email" placeholder="email" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating login-register-form">
                        <input type="password" name="password" class="form-control form-color" id="password" placeholder="Password" required >
                        <label for="password">Password</label>
                    </div>
                    <div class="container">
                        <strong>Already Registered? <a href="/login">Login Here</a></strong>
                    </div>
                    <button class="w-100 btn btn-lg btn-info login-button" type="submit">Register</button>   
            </form>


@endsection