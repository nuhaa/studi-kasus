@extends('admin.templates.default')

@section('content')
<div class="col-md-8 col-md-offset-2 ">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">Add a Product</div>
    </div>
    <form action="{{ route('product.store') }}" class="from-horizontal" method="post">
      @csrf
      <div class="box-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Name</label>
          <div class="col-md-10">
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Please Fill the Name">
            @if ($errors->has('name'))
              <p class="help-block">{{ $errors->first('name') }}</p>
            @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Description</label>
          <div class="col-md-10">
            <textarea name="description" class="form-control" rows="5" placeholder="Product Description">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
              <p class="help-block">{{ $errors->first('description') }}</p>
            @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Price</label>
          <div class="col-md-10">
            <input type="text" name="price" class="form-control" value="{{ old('price') }}" placeholder="Please Fill the Price">
            @if ($errors->has('price'))
              <p class="help-block">{{ $errors->first('price') }}</p>
            @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Category</label>
          <div class="col-md-10">
            <select class="form-control select2" name="category[]" multiple="multiple">
              @foreach ($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>

            @if ($errors->has('category'))
              <p class="help-block">{{ $errors->first('category') }}</p>
            @endif
          </div>
        </div>
      </div>
      <div class="box-footer">
        <a href="{{ route('product.index') }}" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-info pull-right">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('select2styles')
<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
  $(function(){
    $('.select2').select2();
  });
</script>
@endpush
