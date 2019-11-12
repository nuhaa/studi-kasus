@extends('layouts.app')

@section('content')
<div class="container">
  <div class="columns is-centered">
      <div class="column is-half box">
      <h1 class="is-size-3">Login</h1>
      <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="field">
              <label for="" class="label">Email</label>
              <div class="control">
                  <input type="email" class="input @error('email') is-danger @enderror" placeholder="Enter an email address" name="email" value="{{ old('email') }}" required>
                  @error('email')
                      <p class="help is-danger">{{ $message }}</p>
                  @enderror
              </div>
            </div>

            <div class="field">
              <label for="" class="label">Password</label>
              <div class="control">
                  <input type="password" class="input @error('password') is-danger @enderror" placeholder="Enter your password" name="password" value="{{ old('password') }}" required>
                  @error('password')
                      <p class="help is-danger">{{ $message }}</p>
                  @enderror
              </div>
            </div>

            <div class="field">
              <label class="checkbox">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
              </label>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="button is-info">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
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
