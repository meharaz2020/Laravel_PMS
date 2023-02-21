<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      
         
         
          
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Patient</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('register')}}"><i class="fa fa-circle-o"></i> Registation</a></li>
         
            <li><a href="{{url('p_prescription')}}"><i class="fa fa-circle-o"></i> Prescription</a></li>
            <li><a href="{{url('pmedicine')}}"><i class="fa fa-circle-o"></i> History</a></li>
          </ul>
        </li>
         
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Medicine</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('medicine')}}"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="{{url('test')}}"><i class="fa fa-circle-o"></i> Test</a></li>
         
            <li><a href="{{url('medicine_details')}}"><i class="fa fa-circle-o"></i> Details</a></li>
           </ul>
        </li>
         
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Miscellionius</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('disease')}}"><i class="fa fa-circle-o"></i> Disease</a></li>
         
            <li><a href="#"><i class="fa fa-circle-o"></i> Users</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Report</a></li>
          </ul>
        </li>
         
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>