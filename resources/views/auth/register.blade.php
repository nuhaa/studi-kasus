@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half box">
            <h1 class="is-size-3">Register</h1>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="field">
                <label for="" class="label">Name</label>
                <div class="control">
                    <input type="text" class="input @error('name') is-danger @enderror" placeholder="Enter your name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
              </div>

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
                <label for="" class="label">Address</label>
                <div class="control">
                    <input type="text" class="input @error('address') is-danger @enderror" placeholder="Enter your address" name="address" value="{{ old('address') }}" required>
                    @error('address')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
              </div>

              <div class="field">
                <label for="" class="label">Phone</label>
                <div class="control">
                    <input type="text" class="input @error('phone') is-danger @enderror" placeholder="Enter your phone" name="phone" value="{{ old('phone') }}" required>
                    @error('phone')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
              </div>

              <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="button is-info">
                              {{ __('Register') }}
                          </button>
                      </div>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection
