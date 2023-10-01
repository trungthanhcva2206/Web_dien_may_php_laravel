@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/css_user/login.css')}}">
@endsection
@section('content')
<div class="containerdd">
 <h1>{{ __('Login') }}</h1>

                <div class="item">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mail">
                            <label for="email" class="name">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="Enter your Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Enter your password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Erro password</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="log">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="butom_cl">
                                <a href=""><div class="btn"><span>{{ __('Login') }}</span></div></a>
                            
                                    
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>


</div>
@endsection
