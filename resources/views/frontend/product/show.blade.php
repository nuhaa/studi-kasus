@extends('layouts.app')
@section('content')
    <div class="columns">
      <div class="column is-2">
          @include('frontend.components._sidebar')
      </div>
      <div class="column is-10">
          <h1 class="is-size-2 has-text-weight-bold">{{ $product->name }}</h1>
          <div class="columns">
            <div class="column is-4">
                <img src="{{ $product->getImage() }}" alt="">
            </div>
            <div class="column is-8">
              <p class="is-size-4">{{ $product->description }}</p>
              <p class="is-size-5 has-text-danger">{{ $product->getPrice() }}</p>
              <a href="" class="button is-info">Add to Cart</a>
            </div>
          </div>
      </div>
    </div>
@endsection
