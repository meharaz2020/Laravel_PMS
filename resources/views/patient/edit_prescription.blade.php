@include('layouts.topbar')

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
        @include('layouts.navbar')
        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <div class="content-wrapper" style="min-height: 946px;">

            <section class="content-header">
                <h1>
                    Patient prescription
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
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ url('update_prescription',$patientVisitId) }}">
                                @csrf
                                <div class="box-body">
                                    <h2 class="text-center">
                                        Patient
                                    </h2>
                                    <hr>
                                    {{-- ======patient========== --}}
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="">Select Patient</label>
                                            {{-- @dd($allvisit) --}}
                                            {{-- @foreach ($allvisit as $all)
                                            <h2>{{$all->visit_date}}</h2> 
                                            @endforeach --}}
                                            @php
                                                $patient_id = null; // initialize the variable
                                                 
                                            @endphp

                                            @foreach ($allvisit as $all)
                                                @php
                                                    $patient_id = $all->patient_id; // assign the value to the variable
                                                    // $visit_date = $all->visit_date; // assign the value to the variable
                                                    
                                                @endphp
                                            @endforeach
                                            @php
                                            $visit_dates = null; // initialize the array
                                            $bps = null; // initialize the array
                                            $weights = null; // initialize the array
                                            $last_visits = null; // initialize the array
                                          @endphp
                                          
                                          @foreach ($allvisit as $all)
                                              @php
                                               $visit_dates = $all->visit_date; // add the value to the array
                                               $bps = $all->bp; // add the value to the array
                                               $weights = $all->weight; // add the value to the array
                                               $last_visits = $all->last_visit; // add the value to the array
                                             @endphp
                                          @endforeach
                                          
                                          {{-- <p>The visit dates are: {{  $visit_dates }}</p> --}}
                                            


                                            <select name="patient_id" id="patient_id" class="form-control">
                                                <option> Add Patient </option>

                                                @foreach ($allpatient as $p)
                                                    @if ($patient_id == $p->id)
                                                        <option selected value="{{ $p->id }}">
                                                            {{ $p->patient_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $p->id }}">{{ $p->patient_name }}
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Visit date</label>
                                            <input name="visit_date" value="{{$visit_dates}}"  id="visit_date" class="form-control" />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Bp</label>
                                            <input name="bp" id="bp" value="{{$bps}}" class="form-control" />


                                        </div>
                                        <div class="col-md-2">
                                            <label for="">weight</label>
                                            <input name="patient_weight" value="{{$weights}}" id="patient_weight" class="form-control" />


                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Last Visit date</label>
                                            <input name="next_visit_date" value="{{$last_visits}}" id="last_visit_date" class="form-control" />
                                        </div>
                                    </div>

                                    {{-- ======medicine======= --}}
                                    <hr>
                                    <h2 class="text-center">
                                        Medicine
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="">Select Medicine</label>
                                            <select name="medicine" id="medicine" class="form-control">
                                                <option value=""> Add Medicine</option>
                                                @foreach ($allmedicine as $m)
                                                    <option value="{{ $m->id }}">{{ $m->medicine_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Select Packing</label>
                                            <select name="packing" id="packing" class="form-control">

                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Quantity</label>
                                            <input name="quantity" id="quantity" class="form-control" />


                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Dosage</label>
                                            <input name="dosage" id="dosage" class="form-control" />


                                        </div>
                                        <div class="col-md-2">
                                            <label for=""> </label>
                                            <input name="add_medicine_to_list" id="add_medicine_to_list" value="Add"
                                                class="form-control btn btn-sm btn-success" />
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-12 table-responsive">
                                            <table class="table table-bordered" id="medicine_table">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>name</th>
                                                        <th>packing</th>
                                                        <th>quantity</th>
                                                        <th>dosage</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <hr>
                                                <tbody id="medicine_list">

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>



                                    <hr>
                                    <h2 class="text-center">
                                        Disease
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Select Disease</label>
                                            <select name="disease" id="disease" class="form-control">
                                                <option> Add Disease</option>
                                                @foreach ($alldisease as $di)
                                                    <option value="{{ $di->id }}">{{ $di->disease_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="col-md-2">
                                            <label for=""> </label>
                                            <input name="add_disease_to_list" id="add_disease_to_list" value="Add"
                                                class="form-control btn btn-sm btn-success" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 table-responsive">
                                            <table class="table table-bordered" id="disease_table">
                                                <tbody>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Disease name</th>

                                                        <th>action</th>
                                                    </tr>
                                                </tbody>
                                                <hr>
                                                <tbody id="disease_list">
                                                    @php
                                                        $visitcounter=1;
                                                    @endphp
                                                 @foreach ($visitDisease as $vDi)
                                                     <tr>
                                                        <td>{{$visitcounter}}</td>
                                                        <td><input type='hidden' name=diseases[] value='{{$vDi->disease_id}}' />{{$vDi->disease_name}}</td>
                                                        <td><button type='button' class='btn btn-sm btn-danger delete-btn-disease'>X</button></td>
                                                    </tr>
                                            
                                                 @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>





                                    <hr>
                                    <h2 class="text-center">
                                        Test Result
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Select Test</label>
                                            <select name="test" id="test" class="form-control">
                                                <option> Add test</option>
                                                @foreach ($alltest as $at)
                                                    <option value="{{ $at->id }}">{{ $at->test_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">result</label>
                                            <input type="text" class="form-control" id="result"
                                                name="result">
                                        </div>


                                        <div class="col-md-2">
                                            <label for=""> </label>
                                            <input name="add_test_to_list" id="add_test_to_list" value="Add"
                                                class="form-control btn btn-sm btn-success" />
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-12 table-responsive">
                                            <table class="table table-bordered" id="test_table">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Test name</th>
                                                        <th>Result</th>

                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <hr>
                                                <tbody id="test_list">
                                                    @php
                                                    $visitcounter=1;
                                                @endphp
                                             @foreach ($visittest as $vTDi)
                                                 <tr>
                                                    <td>{{$visitcounter}}</td>
                                                    <td><input type='hidden' name=testId[] value='{{$vTDi->lab_test}}' />{{$vTDi->test_name}}</td>
                                                    <td><input type='hidden' name=testId[] value='{{$vTDi->lab_test}}' /> </td>
                                                    <td><button type='button' class='btn btn-sm btn-danger delete-btn'>X</button></td>
                                                </tr>
                                        
                                             @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for=""> </label>
                                            <input name="submit" id="submit" type="submit" value="Update"
                                                class="form-control btn btn-sm btn-success" />
                                        </div>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
            integrity="sha512-zOidRJ/H+drf2JMNkkr7Z+JW8RfbhChCX6fMSuE7/Zx6k8u3qkUweMfU6ZpTnW8hVrCpAhn+uKdH/Kb2os1zhw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <script>
            @php
                $id = 1;
            @endphp

            $(document).ready(function() {

                // ========== Medicine packing query Start ===========
                $("#medicine").change(function() {
                    let medicineId = $(this).val();
                    $("#packing").html('');
                    if (medicineId !== '') {
                        $.ajax({
                            url: "{{ route('get_medicine_packing') }}",
                            type: "GET",
                            data: {
                                "medicine_id": medicineId
                            },
                            cache: false,
                            async: false,
                            success: function(data) {
                                $('#packing').html(data);
                            },
                            error: function(jqXhr, textStatus, errorMessage) {

                            }
                        });
                    }


                });
                // ========== Medicine packing query End ===========

                // ========== Medicine packing Add multi part Start ===========
                $("#add_medicine_to_list").click(function() {
                    let medicineName = $('#medicine option:selected').text();
                    if (medicineName !== null) {
                        medicineName = medicineName.trim();
                    }

                    let packing = $('#packing option:selected').text();
                    if (packing !== null) {
                        packing = packing.trim();
                    }
                    let packId=$("#packing").val();
                    let medicineDetailsId = $('#packing').val();
                    if (medicineDetailsId !== null) {
                        medicineDetailsId = medicineDetailsId.trim();
                    }

                    let quantity = $('#quantity').val();
                    if (quantity !== null) {
                        quantity = quantity.trim();
                    }

                    let dosage = $('#dosage').val();
                    if (dosage !== null) {
                        dosage = dosage.trim();
                    }
                    if (medicineName !== '' && packing !== '' && quantity !== '' && dosage !== '') {

                        let mdDetailsInput = "<input type='hidden' name=medicine_detail_ids[] value='" +
                            medicineDetailsId + "' />";
                        let packid = "<input type='hidden' name=packingId[] value='" +
                            packId + "' />";

                        let qtyInput = "<input type='hidden' name=quantities[] value='" + quantity + "' />";
                        let dosageInput = "<input type='hidden' name=dosages[] value='" + dosage + "' />";


                        let data = "<tr>";
                        data = data + "<td class='medician_s'>" + <?php echo $id; ?> + "</td>";
                        data = data + "<td>" + medicineName + mdDetailsInput+packid+qtyInput+dosageInput+"</td>";
                        data = data + "<td>" + packing + "</td>";

                        data = data + "<td>" + quantity + "</td>";
                        data = data + "<td>" + dosage + "</td>";
                        data = data +
                            "<td><button type='button' class='btn btn-sm btn-danger delete-btn'>X</button></td>";
                        data = data + "</tr>";

                        let OldData = $("#medicine_list").html();
                        let newdata = OldData + data;


                        $("#medicine_list").html(newdata);
                        $("#quantity").val('');
                        $("#dosage").val('');
                        $("#medicine").val('');
                        $("#packing").html('');
                        $("#packing").val('');
                        $("#medicine").select2();
                        $("#packing").select2();



                        @php
                            $id++;
                        @endphp




                    } else {
                        alert("Please fill all input");
                    }


                });

                // ========== Medicine packing Add multi part End ===========
                $("#add_disease_to_list").click(function() {
                    let diseaseName = $('#disease option:selected').text();
                    if (diseaseName !== null) {
                        diseaseName = diseaseName.trim();
                    }
                    let diseaseId = $("#disease").val();
                    if (diseaseName !== '') {
                        let diseaseInput = "<input type='hidden' name=diseases[] value='" + diseaseId + "' />";

                        let data = "<tr>";
                        data = data + "<td>" + <?php echo $id; ?> + "</td>";
                        data = data + "<td>" + diseaseName + diseaseInput+"</td>";

                        data = data +
                            "<td><button type='button' class='btn btn-sm btn-danger delete-btn-disease'>X</button></td>";
                        data = data + "</tr>";
                        let OldData = $("#disease_list").html();
                        let newdata = OldData + data;


                        $("#disease_list").html(newdata);

                        $("#disease").val('');








                    } else {
                        alert("Please fill all input");
                    }

                });
                // ========== disease packing Add multi part Start ===========
                $(document).on("click", ".delete-btn-disease", function() {
                    $(this).closest('tr').remove();
                });


                // ========== Medicine packing Add multi part End ===========
                $("#add_test_to_list").click(function() {
                    let testName = $('#test option:selected').text();
                    if (testName !== null) {
                        testName = testName.trim();
                    }

                    let result = $('#result').val();
                    if (result !== null) {
                        result = result.trim();
                    }
                    let testId = $("#test").val();
                    if (testName !== '') {

                        let testInput = "<input type='hidden' name=testId[] value='" + testId + "' />";
                        let resultInput = "<input type='hidden' name=results[] value='" + result + "' />";

                        let data = "<tr>";
                        data = data + "<td>" + <?php echo $id; ?> + "</td>";
                        data = data + "<td>" + testName + testInput+resultInput+"</td>";
                        data = data + "<td>" + result + "</td>";

                        data = data +
                            "<td><button type='button' class='btn btn-sm btn-danger delete-btn-test'>X</button></td>";
                        data = data + "</tr>";
                        let OldData = $("#test_list").html();
                        let newdata = OldData + data;


                        $("#test_list").html(newdata);

                        $("#test").val('');
                        $("#result").val('');








                    } else {
                        alert("Please fill all input");
                    }

                });
                // ========== disease packing Add multi part Start ===========
                $(document).on("click", ".delete-btn-test", function() {
                    $(this).closest('tr').remove();
                });



                // ========== disease packing Add multi part End ===========

                // ========== Medicinedelete multi part start ===========

                // ========== Medicinedelete multi part end ===========
                $(document).on("click", ".delete-btn", function() {
                    $(this).closest('tr').remove();
                });

                function reArrangeSerial() {
                    mserial = 1;
                    $(".medician_s").each(function() {
                        $(this).html(mserial);
                        mserial++;
                    });
                }
            });
        </script>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>


























    
    @include('layouts.footer2')
    <div class="control-sidebar-bg">


    </div>
    </div><!-- ./wrapper -->

    @include('layouts.footer')
