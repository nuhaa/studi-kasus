@extends('layouts.app')
@section('content')
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <h1 class="is-size-2">Shopping Cart</h1>
            @if ($items)
              @foreach ($items as $item)
                  <header class="card-header">
                      <p class="card-header-title">
                          {{-- menggunakan kurung siku karena data berupa array --}}
                          {{ $item['name'] }}
                      </p>
                  </header>
                  <div class="card-content">
                    <div class="content">
                      <div class="columns">
                        <div class="column is-3">
                          <img src="{{ $item['image'] }}" class="image is-128x128" alt="">
                        </div>
                        <div class="column is-9">
                          <p>{{ $item['description'] }}</p>
                          <p class="has-text-danger is-size-3">{{ $item['formated_price'] }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
              @endforeach
            @else
              <div class="card">
                <div class="card-content">
                  <div class="content">
                    <div class="is-size-5">No Items In Cart</div>
                  </div>
                </div>
              </div>
            @endif

        </div>
    </div>
@endsection
