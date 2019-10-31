@extends('admin.templates.default');

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="display:inline">
              Category
              <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm" style="float:right">Add Category</a>
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width:10px">No</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
            @foreach ($categories as $category)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->description }}</td>
                <td>
                  <a href="" class="btn btn-warning">Edit</a>
                  <a href="" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
