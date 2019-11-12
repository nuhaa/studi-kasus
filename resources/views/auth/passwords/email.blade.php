@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half box">
            <h1 class="is-size-3">Reset Password</h1>
            @if (session('status'))
                <div class="notification is-info">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
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
                  <button type="submit" class="button is-info">
                      {{ __('Send Password Reset Link') }}
                  </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
