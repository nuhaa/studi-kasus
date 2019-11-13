@extends('layouts.app')
@section('content')
    <div class="columns">
      <div class="column is-2">
          @include('frontend.components._sidebar')
      </div>
      <div class="column is-10">
        <div class="columns is-multiline">
          @foreach ($products as $product)
            <div class="column is-3">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by6">
                    <img src="{{ $product->getImage() }}" alt="">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="content">
                    <h5><a href="{{ route('frontend.product.show', $product) }}">{{ $product->name }}</a></h5>
                    <p class="has-text-danger">{{ $product->getPrice() }}</p>
                  </div>
                  <a href="" class="button is-info">Add to Cart</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        {{ $products->links('vendor.pagination.bulma') }}
      </div>
    </div>
@endsection
