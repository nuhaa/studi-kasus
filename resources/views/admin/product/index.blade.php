@extends('admin.templates.default');

@section('content')
@include('admin.templates.partials._alert')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="display:inline">
              Product
              <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm" style="float:right">Add Product</a>
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width:10px">No</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Description</th>
              <th>Category</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            @foreach ($products as $product)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->description }}</td>
                <td>
                  @foreach ($product->categories as $category)
                    <span class="label label-primary">{{ $category->name }}</span>
                  @endforeach
                </td>
                <td>{{ number_format($product->price, 0) }}</td>
                <td>
                  <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                  {{-- <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger">Delete</a> --}}
                  <button class="btn btn-danger" id='delete' data-title='{{ $product->name }}' href={{ route('product.destroy', $product->id) }}> <i class="fa fa-trash"></i> Delete</button>
                  <form action="" method="post" id="deleteForm">
                    @csrf
                    @method("DELETE")
                    <input type="submit" style="display:none" value="">
                  </form>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
        <div class="box-footer clearfix">
          {{ $products->links('vendor.pagination.adminlte') }}
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript">
    $('button#delete').on('click', function(){
        var href  = $(this).attr('href');
        var title = $(this).data('title');

        Swal.fire({
          title: 'Delete this '+ title +' product',
          text: "One deleted, you will not be able to recover this category",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            document.getElementById('deleteForm').action = href;
            document.getElementById('deleteForm').submit();
            Swal.fire(
              'Deleted!',
              'Your product has been deleted.',
              'success'
            )
          }
        });
    });
  </script>
@endpush
