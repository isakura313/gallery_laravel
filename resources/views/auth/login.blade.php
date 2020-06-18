@include('includes.header')

<body>
    @include('includes.nav')
    @section('content')
    <div class="columns is-centered main-register has-background-grey">
        <div class="column is-half-desktop is-full-mobile is-full-tablet">
            <div class="card form-register"> 
            <h3 class="is-size-3 has-text-centered "> {{ __('Login') }} </h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                        <p class="help is-danger"> 
                            <i class="fas fa-envelope">{{ $message }}</i>
                        </p>
                         @enderror
                </div>
                <div class="field">
                    <label for="password" class="label">{{ __('Password') }}</label>
                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror"
                            name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="icon is-small is-left" role="alert">
                            <i class="fas fa-envelope">{{ $message }}</i>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        {{-- <input class="input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        --}}
                        <label class="checkbox" for="remember">
                            <input type="checkbox">
                            {{ __('Remember Me') }} </label>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button button-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="button button-primary" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
        </form>
    </div>
</div>
</div>

 
    @endsection
    @yield('content')
    <style>
        .main-register{
            height: 94vh;
        }
        .form-register{
            padding: 0 2em 5em 2em;
            border-radius: 5px;
        }

    </style>
</body>

</html>