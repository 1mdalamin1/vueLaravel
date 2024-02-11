@extends('adminlte::page')

@section('title', 'Employee | Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between flex-wrap">
        <h1>Employee list</h1>
                
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
            <button type="button" class="ml-2 mb-1 mr-1 close text-danger" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <div class="toast-body"></div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="errorBox"></div>
            </div>
        </div>

        <!-- Modal on -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog  modal-dialog-scrollable">
            <!-- Modal content-->
            <div class="modal-content">
            
                <div class="modal-header">
                <h4 class="modal-title">Add New Employee</h4>
                <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- <div class="row">
                        <div class="col-12">
                            <div id="errorEmployeeFromBox"></div>
                        </div>
                    </div> -->
                <form id="employeeAddForm" data-parsley-validate action="{{route('hrm.store.employee')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                    <div class="row">
                        <div class="col-md-6">
                                    
                            <div class="form-group">
                                <label for="employee_id" class="form-label">Employee Id<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="Employee Id is required" type="text" name="employee_id" class="form-control" placeholder="Ex: e-123" value="{{old('employee_id')}}">
                            </div>
                            
                            <div class="form-group">
                                <label for="user_id" class="form-label">Name</label>
                                <select class="form-control multiple-not " id="user_id" data-placeholder="Select a department" name="user_id">
                                @foreach ($users as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="department_id" class="form-label">Depertments</label>
                                <select class="form-control" multiple="multiple" id="department_id" data-placeholder="Select a department" name="department_id[]">
                                @foreach ($depertments as $role)
                                    <option value="{{$role->id}}">{{$role->designation_name}}</option>
                                @endforeach
                                </select>
                            </div>

                        </div>
                        <!-- End left side  -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="image" class="form-label">image<span class="text-danger">*</span></label>
                                <input type="file" id="image" name="image" class="form-control" placeholder="Ex: e-123" value="{{old('image')}}">
                            </div>
                            <img id="employee_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ old('image') ? Storage::url(old('image')) : '' }}" alt="Employee image preview" width="200" />

                        </div>
                        <!-- End Right side side  -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="blood" class="form-label">Blood Group<span class="text-danger">*</span></label>
                                <input required type="text" id="blood" name="blood" class="form-control" placeholder="Ex: e-123" value="{{old('blood')}}">
                            </div>
                            <div class="form-group">
                                <label for="joining_date" class="form-label">Joining date<span class="text-danger">*</span></label>
                                <input required type="date" id="joining_date" name="joining_date" class="form-control" placeholder="Ex: e-123" value="{{old('joining_date')}}">
                            </div>
                            <div class="form-group">
                                <label for="dob" class="form-label">Date of barth<span class="text-danger">*</span></label>
                                <input type="date" id="dob" name="dob" class="form-control" placeholder="Ex: e-123" value="{{old('dob')}}">
                            </div>
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                <select class="form-control multiple-not " id="gender" data-placeholder="Select a gender" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                        </div>
                        <!--  End left side  --> 
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="01795xxxxxx" value="{{old('phone')}}" required data-parsley-type="number" data-parsley-type-message="Please enter a valid number address" data-parsley-error-message="Invalid number address" >
                                @if($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nid" class="form-label">NID No:<span class="text-danger">*</span></label>
                                <input type="text" id="nid" name="nid" class="form-control" placeholder="Ex: e-123" value="{{old('nid')}}">
                            </div>
                            
                            <div class="form-group">
                                <label for="salary" class="form-label">Salary<span class="text-danger">*</span></label>
                                <input type="text" id="salary" name="salary" class="form-control" placeholder="Ex: e-123" value="{{old('salary')}}">
                            </div>
                            
                            <div class="form-group">
                                <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                <select class="form-control multiple-not " id="status" data-placeholder="Select a status" name="status">
                                    <option value="Active">Active</option>
                                    <option value="inActive">inActive</option>
                                </select>
                            </div>

                        </div>
                        <!-- End Right side side  -->
                    </div>
                        
                    <div class="form-group">
                        <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control" placeholder="Ex: e-123" value="{{old('address')}}">
                    </div>
                    <div id="errorEmployeeFromBox"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>

            </div>
        </div>
        <!-- Modal off -->






        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title float-none">
                            <div class="text-right">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">+ Add Employee</button>
                            </div>
                            <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-html="true" title="When click this button it show a popup from.">
                            + Add Employee
                            </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Data table on -->
                        <div class="table-responsive">
                            <table id="employeeData" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Depertment</th>
                                        <th>Employee</th>
                                        <th>Roles & Join</th>
                                        <th>img</th>
                                        <th>Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <!-- Data table off -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script src="node_modules/parsleyjs/dist/parsley.min.js"></script>  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js" integrity="sha512-Fq/wHuMI7AraoOK+juE5oYILKvSPe6GC5ZWZnvpOO/ZPdtyA29n+a5kVLP4XaLyDy9D1IBPYzdFycO33Ijd0Pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script>
        // create onchange event listener for image input
        document.getElementById('image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in employee_image_preview
                document.getElementById('employee_image_preview').src = URL.createObjectURL(file)
            }
        }
        
        $(function (){
            $('#department_id, #user_id').select2();
        });

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            $('#myModal').on('show.bs.modal', function () {
                $('#employeeAddForm').parsley();

                // Add an event listener for form submission
                $('#employeeAddForm').on('submit', function(event){
                    event.preventDefault(); // Prevent default form submission

                    // Serialize the form data
                    // var formData = $(this).serialize();
                    var formData = new FormData(this); // Create a FormData object to handle file uploads

                    // Send an AJAX request
                    $.ajax({
                        url: $(this).attr('action'), // Use the form's action attribute
                        type: $(this).attr('method'), // Use the form's method attribute
                        data: formData,
                        contentType: false, // Don't set content type (allows FormData to set it)
                        processData: false, // Don't process data (allows FormData to process it)
                        success: function(response) {

                            $("#errorBox").html('');
                            $("#errorEmployeeFromBox").html('');
                            $("#employeeData").DataTable().ajax.reload();
                            // Reset form
                            $("#employeeAddForm").trigger("reset");// $(this).trigger('reset');
                            $("#employeeAddForm .close").click();// close Modal
                            // Display toast message
                            // toast('New Employee added successfully!','success');
                            $('.toast').toast('show');
                            $('.toast-body').html(`<div class="text-success">New Employee added successfully!</div>`);
                            $('.close').click();

                        },
                        error: function(xhr, status, error) {
                            // Handle the error response if needed
                            let errorMessage = xhr.responseText;
                            let errorJson = JSON.parse(xhr.responseText);
                            
                            let htmlErrors = '';

                            for (let key in  errorJson.errors) {
                                htmlErrors += `<p>${errorJson.errors[key]}</p>`;
                            }
                            // ${errorJson.message}
                            $("#errorEmployeeFromBox").html(`<div class="alert alert-danger">${htmlErrors}</div>`);

                        }
                    });
                });
            });

            // Show Employee with Yajra DataTable
            let table = $('#employeeData').DataTable({
                responsive:true, processing:true, serverSide:true, autoWidth:false,
                ajax:"{{route('hrm.employee')}}",
                columns:[
                    {data:'id', name:'id'},
                    {data:'department', name:'department'},
                    {data:'user_name', name:'user_name'},
                    {data:'roles', name:'roles'},
                    {data:'img', name:'img'},
                    {data:'salary', name:'salary'},
                    {data:'action', name:'action'},
                ],
                order:[[0,"desc"]]
            });

            // Delete Employee javaScript
            $('body').on('click', '#btnDel', function(){
                //confirmation
                let id = $(this).data("id");
                if(confirm('Delete Data '+id+'?')==true){
                    //execute delete
                    let route = "{{route('hrm.destroy.employee', ':id')}}";
                    route = route.replace(':id', id);
                    $.ajax({
                        url:route,
                        type:"delete",
                        success:function(res){
                            // console.log(res);
                            $("#employeeData").DataTable().ajax.reload();
                        },
                        error:function(res){
                            $("#errorBox").html('<div class="alert alert-danger">'+res.message+'</div>');
                        },
                    });
                } else {
                    // do nothing
                }

            });

            $('[data-toggle="tooltip"]').tooltip();

        });
    </script>
@stop
@section('plugins.Datatables', true)
@section('plugins.Select2', true)
@section('plugins.Parsley', true)


