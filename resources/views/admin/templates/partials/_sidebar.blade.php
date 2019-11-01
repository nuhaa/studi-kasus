<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      {{-- <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>
       --}}
      <li class="header">MAIN NAVIGATION</li>
      <li class='{{ Request::path() == "admin/dashboard" ? "active" : "" }}' ><a href="{{ route('admin.index') }}"><i class="fa fa-angle-double-right"></i> <span>Dashboard</span></a></li>
      <li class='{{ (Request::is('admin/category/*') or Request::is('admin/category'))  ? "active" : "" }}' ><a href="{{ route('category.index') }}"><i class="fa fa-angle-double-right"></i> <span>Category</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
