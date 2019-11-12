@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half box">
            <h1 class="is-size-3">Reset Password</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
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
                  <label for="" class="label">Confirm Password</label>
                  <div class="control">
                      <input type="password" class="input @error('password_confirmation') is-danger @enderror" placeholder="Confirm your password" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                      @error('password_confirmation')
                          <p class="help is-danger">{{ $message }}</p>
                      @enderror
                  </div>
                </div>

                <div class="field">
                    <button type="submit" class="button is-info">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
