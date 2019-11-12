@extends('layouts.app')
@section('content')
    <div class="columns">
      <div class="column is-2">
        <aside class="menu">
          <p class="menu-label">Categories</p>
          <ul class="menu-list">
            <li><a href="">Category 1</a></li>
            <li><a href="">Category 2</a></li>
            <li><a href="">Category 3</a></li>
          </ul>
        </aside>
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
                    <h5>{{ $product->name }}</h5>
                    <p class="has-text-danger">Rp. {{ number_format($product->price, 0, ",", ".") }}</p>
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
