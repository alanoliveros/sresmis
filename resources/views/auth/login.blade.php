@extends('auth.authlayout')
@section('title', 'Login')
@section('content')
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <div>
        <div class="main-wrapper" style="display: flex; justify-content: center; align-items: center; height: 90vh">
            <div class="preloader ">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>

            <!-- end preloader -->
            <div class="d-flex no-block justify-content-center align-items-center">
                <div class="auth-wrapper mt-5">
                    <div class="auth-box ">
                        <div id="loginform">
                            <div class="text-center pt-3 pb-3">
                                {{--<span class="db"><img src="{{asset('assets/img/icon/sresmis.png')}}" alt="logo"/>SRESMIS</span>--}}
                                <h1 class="logo me-auto"><a href="{{url('/')}}"><span
                                            style="color: #28B779;">SRES</span><span
                                            style="color:#ffb848;">MIS</span></a></h1>
                            </div>
                            <!-- Form -->
                            <form method="POST" action="{{ route('login') }}" class="">
                                @csrf

                                <div class="row ">
                                    <div class="col-12">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                 <span
                     class="input-group-text bg-success text-white h-100"
                     id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                                            </div>
                                            <input
                                                type="text"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                placeholder="Email"
                                                aria-label="Email"
                                                value="{{ old('email') }}"

                                                aria-describedby="basic-addon1"
                                                name="email"
                                                required autocomplete="email" autofocus/>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                   </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                 <span
                     class="input-group-text bg-warning text-white h-100"
                     id="basic-addon2"
                 ><i class="mdi mdi-lock fs-4"></i
                     ></span>
                                            </div>
                                            <input
                                                type="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                placeholder="Password"
                                                aria-label="Password"
                                                aria-describedby="basic-addon1"
                                                name="password" required autocomplete="current-password"
                                            />

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label text-light" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border-top border-secondary">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="pt-3">
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link"
                                                       style="text-decoration: none"
                                                       href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                                @endif
                                                <button
                                                    class="btn btn-success float-end text-white"
                                                    type="submit"
                                                >
                                                    Login
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
