@extends('frontend.main_master')
@section('content')
<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{ url('/')}}">Home</a></li>
                            <li class="active">Login Register</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form method="POST" action="{{  isset($guard) ? url($guard.'/login') : route('login')  }}">
                             @csrf
                                <div class="login-form mt-20">
                                    <h4 class="login-title">Login</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Email Address*</label>
                                            <input class="mb-0" type="email" id="email" name="email" placeholder="Email Address" required>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Password</label>
                                            <input class="mb-0" type="password" id="password" name="password"placeholder="Password" required>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="{{ route('password.request')}}"> Forget Password?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="register-button mt-0" type="submit">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                        <form method="POST" action="{{ route('register') }}">
                         @csrf

                                <div class="login-form mt-20">
                                    <h4 class="login-title">Register</h4>
                                    <div class="row">
                                        <div class="col-md-12 mb-20">
                                            <label>Full Name</label>
                                            <input class="mb-0" type="text" id="name" name="name" placeholder="Full Name" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{  $message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email Address*</label>
                                            <input class="mb-0" type="email" id="email" name="email" placeholder="Email Address" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{  $message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Matric No*</label>
                                            <input class="mb-0" type="text" id="matricNo" name="matricNo" placeholder="Matric No" required>
                                            @error('matricNo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{  $message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Password</label>
                                            <input class="mb-0" type="password" id="password" name="password" placeholder="Password" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{  $message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Confirm Password</label>
                                            <input class="mb-0" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{  $message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="register-button mt-0">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection