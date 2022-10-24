@extends('frontend.main_master')
@section('content')
<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{ url('/')}}">Home</a></li>
                            <li class="active">Reset Password</li>
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
                            <form method="POST" action="{{ route('password.update') }}">
                             @csrf

                             <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="login-form mt-20">
                                <h4 class="login-title">Reset Password</h4>
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" :value="old('email', $request->email)" type="email" class="form-control" id="email">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control" id="password">
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                                    </div>
                                    </div>

                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection