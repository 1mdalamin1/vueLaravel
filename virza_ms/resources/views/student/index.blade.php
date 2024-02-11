@extends('adminlte::page')

@section('title', 'Students | Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between flex-wrap">
        <!-- <h1>Students list</h1> -->
                
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
        <div class="modal fade bd-example-modal-lg" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <!-- Modal content-->
            <div class="modal-content">
            
                <div class="modal-header">
                <h4 class="modal-title">Add New Student</h4>
                <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- <div class="row">
                        <div class="col-12">
                            <div id="errorInstitutesFromBox"></div>
                        </div>
                    </div> -->
                <form id="institutesAddForm" data-parsley-validate action="{{route('stu.store.student')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                    <div class="row">
                        <div class="col-md-4">
                                                                
                            <div class="form-group">
                                <label for="student_name" class="form-label">Students name<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="Students name is required" type="text" name="name" class="form-control" placeholder="Student name" value="{{old('name')}}">
                            </div>
                                                                
                            <div class="form-group">
                                <label for="student_father" class="form-label">Students father<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="Students father is required" type="text" name="father" class="form-control" placeholder="Student father" value="{{old('father')}}">
                            </div>
                                                                
                            <div class="form-group">
                                <label for="student_mother" class="form-label">Students mother<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="Students mother is required" type="text" name="mother" class="form-control" placeholder="Student mother" value="{{old('mother')}}">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="01795xxxxxx" value="{{old('phone')}}" required data-parsley-type="number" data-parsley-type-message="Please enter a valid number address" data-parsley-error-message="Invalid number address" >
                                @if($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                                      

                        </div>
                        <!-- 1s row 1st col -->
                        <div class="col-md-4">
                                                      
                            <div class="form-group">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="email is required" type="text" name="email" class="form-control" placeholder="Student email" value="{{old('email')}}">
                            </div>
                                                      
                            <div class="form-group">
                                <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="address is required" type="text" name="address" class="form-control" placeholder="Student address" value="{{old('address')}}">
                            </div>
                            
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                <select class="form-control multiple-not " id="gender" data-placeholder="Select a gender" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                                                      
                            <div class="form-group">
                                <label for="dob" class="form-label">Date of birth<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="Date of birth is required" type="datetime-local" name="dob" class="form-control" placeholder="Student Date of birth" value="{{old('dob')}}">
                            </div>

                            
                        </div>
                        <!-- 1s row 2nd col  -->
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="image" class="form-label">Student image<span class="text-danger">*</span></label>
                                <input type="file" id="image" name="image" class="form-control" placeholder="Ex: e-123" value="{{old('image')}}">
                            </div>
                            <img id="student_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ old('image') ? Storage::url(old('image')) : '' }}" alt="Students image preview" width="200" />

                        </div>
                        <!-- 1s row 3rd col -->
                    </div>
                <!-- 1st row The End -->
                    <div class="row">
                        <div class="col-md-4">
                            
                            <div class="form-group">
                                <label for="blood" class="form-label">1 of 8 blood groups<span class="text-danger">*</span></label>
                                <select class="form-control multiple-not " id="blood" data-placeholder="Select a blood" name="blood">
                                    <option value="A RhD positive (A+)">A RhD positive (A+)</option>
                                    <option value="A RhD negative (A-)">A RhD negative (A-)</option>
                                    <option value="B RhD positive (B+)">B RhD positive (B+)</option>
                                    <option value="B RhD negative (B-)">B RhD negative (B-)</option>
                                    <option value="O RhD positive (O+)">O RhD positive (O+)</option>
                                    <option value="O RhD negative (O-)">O RhD negative (O-)</option>
                                    <option value="AB RhD positive (AB+)">AB RhD positive (AB+)</option>
                                    <option value="AB RhD negative (AB-)">AB RhD negative (AB-)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="session" class="form-label">Session:<span class="text-danger">*</span></label>
                                <input type="number" id="session" name="session" class="form-control" placeholder="Ex: 2023" value="{{old('session')}}">
                            </div>
                                                        
                            <div class="form-group">
                                <label for="religion" class="form-label">Religion<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="Religion is required" type="text" id="religion" name="religion" class="form-control" placeholder="Student religion" value="{{old('religion')}}">
                            </div>

                        </div>
                        <!--  End left side  --> 
                        <div class="col-md-4">
                            
                            <div class="form-group">
                                <label for="department_id" class="form-label">Class</label>
                                <select class="form-control multiple-not " id="department_id" data-placeholder="Select a user name" name="department_id">
                                @foreach ($department as $role)
                                    <option value="{{$role->id}} | {{$role->designation_name}}">{{$role->designation_name}}</option>
                                @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="roll_no" class="form-label">Class roll:<span class="text-danger">*</span></label>
                                <input type="number" id="roll_no" name="roll_no" class="form-control" placeholder="Ex: 1" value="{{old('roll_no')}}">
                            </div>
                                                
                            <div class="form-group">
                                <label for="note" class="form-label">Note<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="Note is required" type="text" id="note" name="note" class="form-control" placeholder="Student note" value="{{old('note')}}">
                            </div>

                        </div>
                        <div class="col-md-4">
                            
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
                        
                    <div id="errorInstitutesFromBox"></div>
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
                        <div class="d-flex justify-content-between">
                            <div class="text-left">
                                <h2>Students list</h2>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">+ Add Students</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Data table on -->
                        <div class="table-responsive">
                            <table id="studentData" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name & Roll</th>
                                        <th>Religion & dob</th>
                                        <th>Parents</th>
                                        <th>Contact</th>
                                        <th>Image</th>
                                        <th>Addmit date</th>
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


    <!-- info show Modal on -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Student Information Details</h5>
            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body show-school-info">
            
            <div class="login-wrap text-center">
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-danger" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-warning" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-dark" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>



        </div>
        </div>
    </div>
    </div>
    <!-- info show Modal off -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        // create onchange event listener for image input
        document.getElementById('image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in student_image_preview
                document.getElementById('student_image_preview').src = URL.createObjectURL(file)
            }
        }
        
        $(function (){
            $('#user_id').select2();
        });

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            $('#myModal').on('show.bs.modal', function () {
                $('#institutesAddForm').parsley();

                // Add an event listener for form submission
                $('#institutesAddForm').on('submit', function(event){
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
                            $("#errorInstitutesFromBox").html('');
                            $("#studentData").DataTable().ajax.reload();
                            // Reset form
                            $("#institutesAddForm").trigger("reset");// $(this).trigger('reset');
                            $("#institutesAddForm .close").click();// close Modal
                            // Display toast message
                            // toast('New Students added successfully!','success');
                            $('.toast').toast('show');
                            $('.toast-body').html(`<div class="text-success">New Students added successfully!</div>`);
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
                            $("#errorInstitutesFromBox").html(`<div class="alert alert-danger">${htmlErrors}</div>`);

                        }
                    });
                });
            });


            // Show Students with Yajra DataTable
            let table = $('#studentData').DataTable({
                responsive:true, processing:true, serverSide:true, autoWidth:false,
                ajax:"{{route('stu.student')}}",
                columns:[
                    {data:'id', name:'id'},
                    {data:'name_roll', name:'name_roll'},
                    {data:'rg_dob', name:'rg_dob'},
                    {data:'parents', name:'parents'},
                    {data:'contact', name:'contact'},
                    {data:'img', name:'img'},
                    {data:'addmit_date', name:'addmit_date'},
                    {data:'action', name:'action'},
                    // 'name_roll', 'rg_dob', 'parents', 'contact', 'img', 'addmit_date', 'action'
                ],
                order:[[0,"desc"]]
            });

            // Delete Students javaScript
            $('body').on('click', '#btnDel', function(){
                //confirmation
                let id = $(this).data("id");
                if(confirm('Delete Data '+id+'?')==true){
                    //execute delete
                    let route = "{{route('stu.destroy.student', ':id')}}";
                    route = route.replace(':id', id);
                    $.ajax({
                        url:route,
                        type:"delete",
                        success:function(res){
                            // console.log(res);
                            $("#studentData").DataTable().ajax.reload();
                        },
                        error:function(res){
                            $("#errorBox").html('<div class="alert alert-danger">'+res.message+'</div>');
                        },
                    });
                } else {
                    // do nothing
                }

            });

            // Show Students javaScript
            $('body').on('click', '#btnShow', function(){
                //confirmation
                let id = $(this).data("id");
                let route = "{{route('stu.show.student', ':id')}}";
                route = route.replace(':id', id);
                $.ajax({
                    url:route,
                    type:"get",
                    success:function(res){

                        $('.show-school-info').html(' ');
                        $('.show-school-info').html(res);
                        // $('#myModal').modal('show');
                    },
                    error:function(res){
                        $("#errorBox").html('<div class="alert alert-danger">'+res.message+'</div>');
                    },
                });

            });


        });
    </script>
@stop
@section('plugins.Datatables', true)
@section('plugins.Select2', true)
@section('plugins.Parsley', true)


