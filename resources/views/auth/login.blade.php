@extends('auth.app')
@section('content')
<section>
    <div class="wrapper">
        <div class="container main">
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <div class="row">
                    <div class="col-md-6 side-image">
                        <img src="{{asset('../image/Navlogo.png')}}" alt="">
                        <div class="text">

                        </div>

                    </div>
                    <div class="col-md-6 right">
                        <div class="input-box">
                            <header>CCH Interactive Map</header>
                            <div class="input-field">
                                <input type="text" name="email" class="input @error('email') is-invalid @enderror"
                                    id="email" required="">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password"
                                    class="input @error('password') is-invalid @enderror" id="pass" required="">
                                <label for="pass">Password</label>
                            </div>
                            <div class="input-fields">

                                <input class="form-check-input " type="checkbox" name="remember" id="remember" {{
                                    old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>

                            </div>
                            <div class="input-field">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="submit">Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
                <form>
        </div>
    </div>
</section>



@endsection