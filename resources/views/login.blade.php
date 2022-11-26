@extends('layouts.authtemplate')

@section('title', 'Login')

@section('content')

    
            <form action="" method="post" class="col-sm-4 custom-form">
                    @csrf
                    <h1 class="h3 my-4 fw-normal login-font text-center ">LOGIN</h1>

                    {{-- Register Success --}}
                    @if(Session::has('register-message'))
                        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                            {{ Session::get('register-message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>    
                    @endif  

                    {{-- Login Fail --}}
                    @if(Session::has('login-error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                            {{ Session::get('login-error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>    
                    @endif  

                    <div class="form-floating login-register-form">
                        <input type="email" name="email" class="form-control form-color" id="email" placeholder="email" required>
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating login-register-form">
                        <input type="password" name="password" class="form-control form-color" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="container">
                        <strong>Not Registered? <a href="/register">Register Here</a></strong>
                    </div>
                    <button class="w-100 btn btn-lg btn-warning login-button" type="submit">Login</button>   
            </form>


@endsection