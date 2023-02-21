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
              Patient Form Elements
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
              <form role="form" method="POST" action="{{url('patient_edit_id',$patient_view->id)}}">
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{$patient_view->patient_name}}" name="patient_name" required class="form-control" id="exampleInputEmail1" placeholder="Enter disease">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">DOB</label>
                    <input type="text" value="{{$patient_view->date_of_birth}}" name="date_of_birth" required class="form-control" id="exampleInputEmail1" placeholder="Enter disease">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">GENDER</label>
                    <select name="gender" id="" class="form-control">
                      
                        @if ($patient_view->gender==1)
                        <option value="1">Male</option>
                      @endif 
                        @if ($patient_view->gender==2)
                        <option  value="2">Female</option>
                     @endif
                      
                    </select>
                   </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" value="{{$patient_view->phone_number}}" name="phone_number" required class="form-control" id="exampleInputEmail1" placeholder="Enter disease">
                  </div>
                   
                </div><!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                </div>
              </form>
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
