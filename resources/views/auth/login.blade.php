@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center  ">
        <div class="col-md-6 align-items-center justify-content-center d-none d-md-block">
            <img class="img-fluid" src="/images/login.jpg" />
        </div>
        <div class="col-md-5">
            <div class="card">
                @if ($errors->any())
            @foreach ($errors->all() as $error)
              <div>{{$error}}</div>
            @endforeach
          @endif
                @error('error')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
               
                <div id="parent" class="card-body">
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                      
                       <div class="row">
                       <label for="email" class="col-md-12 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-12 mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>
                       <div class="row">
                       <label for="password" class="col-md-12 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-12 mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>

                       <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                       
            
                        <button class="btn btn-primary btn-lg btn-block" type="submit">   {{ __('Login') }} </button>

                        @if (Route::has('password.request'))
                                    <a class="btn btn-link mt-3" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                         @endif
                        
                    </div>
                      </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
@endpush
