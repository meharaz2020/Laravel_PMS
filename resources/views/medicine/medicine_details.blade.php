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
              Medicine details
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{url('medicine_details_save')}}">
                @csrf
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Medicine Name</label>
                        <select name="medicine_id" id="medicine_id" class="form-control">
                            <option value="">Select Medicine</option>
                            @foreach ($allmedicine as $am )

                            <option value="{{$am->id}}">{{$am->medicine_name}}</option>
                                
                            @endforeach
                        </select>        
                    
                    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Packing</label>
                       <input type="text" name="packing" id="packing" class="form-control">    
                    
                    </div>
                    </div>
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
                <h3 class="box-title">Medicine Details</h3>
                 
              </div><!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table">
                  <tbody><tr>
                    <th style="width: 10px">Id</th>
                    <th>Medicine Name</th>
                    <th>Packing</th>
                    <th>Edit</th>
                   </tr>
                   @php
                     $counter=1
                   @endphp
                   @foreach ($allmedicine_details as $all )
                     <tr>
                    <td>{{$counter}}</td>
                    <td>{{$all->medicine_id}}</td>
                    <td>{{$all->packing}}</td>
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
