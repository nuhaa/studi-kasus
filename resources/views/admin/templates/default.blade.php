<!DOCTYPE html>
<html>
  <head>
    @include('admin.templates.partials._head')
  </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  {{-- header --}}
  @include('admin.templates.partials._header')
  
  {{-- sidebar --}}
  @include('admin.templates.partials._sidebar')

  {{-- content --}}
  <div class="content-wrapper">
    
    {{-- breadcrumb --}}
    @include('admin.templates.partials._breadcrumb')
    <section class="content">
      @yield('content')
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('admin.templates.partials._footer')
  </footer>

  <!-- Control Sidebar -->
  @include('admin.templates.partials._control-sidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

  @include('admin.templates.partials._script')
</body>
</html>
