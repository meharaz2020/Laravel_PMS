@include('layouts.topbar')

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
 @include('layouts.navbar')
        <!-- Left side column. contains the logo and sidebar -->
       @include('layouts.sidebar')
       
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 946px;">

          <section class="content-header">
            <h1>
              Medicine Form Elements
              <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Forms</a></li>
              <li class="active">General Elements</li>
            </ol>
          </section>
          <section class="content">
            <div class="row">
          <!-- Content Header (Page header) -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{url('medicine_save')}}">
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Medicine</label>
                    <input type="text" name="medicine_name" required class="form-control" id="exampleInputEmail1" placeholder="Enter disease">
                  </div>
                   
                </div><!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div><!-- /.box -->
 
          </div>


          <div class="col-md-6">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Medicine</h3>
                 
              </div><!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table">
                  <tbody><tr>
                    <th style="width: 10px">Id</th>
                    <th>Medicine Name</th>
                    <th>Edit</th>
                   </tr>
                   @php
                     $counter=1
                   @endphp
                   @foreach ($allmedicine as $all )
                     <tr>
                    <td>{{$counter}}</td>
                    <td>{{$all->medicine_name}}</td>
                    <td>
                       <a href="#"><i class="fa fa-edit"></i></a>
                    </td>
                   </tr>
                   @php
                   $counter++
                 @endphp
                   @endforeach
                  
                   
                </tbody></table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->

           
          </div>












          
            </div>
          </section>
  
        
        </div><!-- /.content-wrapper -->
        @include('layouts.footer2')
        <div class="control-sidebar-bg">


        </div>
      </div><!-- ./wrapper -->
 
      @include('layouts.footer')
