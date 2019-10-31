@extends('admin.templates.default')

@section('content')
<div class="col-md-8 col-md-offset-2 ">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">Add a Category</div>
    </div>
    <form action="{{ route('category.store') }}" class="from-horizontal" method="post">
      @csrf
      <div class="box-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Name</label>
          <div class="col-md-10">
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Please Fill the Name">
          </div>
        </div>
        @if ($errors->has('name'))
          <p class="help-block">{{ $errors->first('name') }}</p>
        @endif
        <br>
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Description</label>
          <div class="col-md-10">
            <input type="text" name="description" class="form-control" value="{{ old('description') }}" placeholder="Please Fill the Description">
          </div>
          @if ($errors->has('description'))
            <p class="help-block">{{ $errors->first('description') }}</p>
          @endif
        </div>
      </div>
      <div class="box-footer">
        <a href="{{ route('category.index') }}" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-info pull-right">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
