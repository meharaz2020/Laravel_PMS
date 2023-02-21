@include('layouts.topbar')

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
 @include('layouts.navbar')
        <!-- Left side column. contains the logo and sidebar -->
       @include('layouts.sidebar')
  
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          Medicine page
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Patoent</h3>
                 
              </div><!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table">
                  <tbody><tr>
                    <th style="width: 10px">Id</th>
                    <th>Patient id</th>
                    <th>bp</th>
                    <th>Weight</th>
                    
                    <th>Edit</th>
                   </tr>
                   @php
                     $counter=1
                   @endphp
                   @foreach ($patientVisit as $all )
                     <tr>
                    <td>{{$counter}}</td>
                    <td>{{$all->patient_id}}</td>
                    <td>{{$all->bp}}</td>
                    <td>{{$all->weight}}</td>
                     
                    <td>
                       <a href="{{url('updateprescription',[$all->patient_id, $all->id])}}"><i class="fa fa-edit"></i></a>
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
        
        </div><!-- /.content-wrapper -->
        @include('layouts.footer2')
        <div class="control-sidebar-bg">


        </div>
      </div><!-- ./wrapper -->
 
      @include('layouts.footer')
