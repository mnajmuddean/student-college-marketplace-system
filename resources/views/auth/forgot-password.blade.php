@extends('student.main_master')
@section('content')
<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{ url('/')}}">Home</a></li>
                            <li class="active">Forget Password</li>
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
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="login-form mt-20">
                                    <h4 class="login-title">Forgot Password</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Email Address*</label>
                                            <input class="mb-0" type="email" id="email" name="email" placeholder="Email Address" required>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="register-button mt-0" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection