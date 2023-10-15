@extends('adminlte::page')

@section('title', 'Institutes | Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between flex-wrap">
        <h1>Institutes list</h1>
                
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
                <h4 class="modal-title">Add New School</h4>
                <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- <div class="row">
                        <div class="col-12">
                            <div id="errorInstitutesFromBox"></div>
                        </div>
                    </div> -->
                <form id="institutesAddForm" data-parsley-validate action="{{route('ins.store.institutes')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                    <div class="row">
                        <div class="col-6">
                                                                
                            <div class="form-group">
                                <label for="institutes_name" class="form-label">Institutes name<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="Institutes name is required" type="text" name="name" class="form-control" placeholder="School name" value="{{old('name')}}">
                            </div>
                                                                
                            <div class="form-group">
                                <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="address is required" type="text" name="address" class="form-control" placeholder="School address" value="{{old('address')}}">
                            </div>
                            
                            <div class="form-group">
                                <label for="user_id" class="form-label">Head sir Name</label>
                                <select class="form-control multiple-not " id="user_id" data-placeholder="Select a user name" name="user_id">
                                @foreach ($users as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                                </select>
                            </div>

                        </div>
                        <!-- End left side  -->
                        <div class="col-6">

                            <div class="form-group">
                                <label for="image" class="form-label">Head sir image<span class="text-danger">*</span></label>
                                <input type="file" id="image" name="image" class="form-control" placeholder="Ex: e-123" value="{{old('image')}}">
                            </div>
                            <img id="institutes_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ old('image') ? Storage::url(old('image')) : '' }}" alt="Institutes image preview" width="200" />

                        </div>
                        <!-- End Right side side  -->
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="signature" class="form-label">Head sir signature<span class="text-danger">*</span></label>
                                <input type="file" id="signature" name="signature" class="form-control" placeholder="Ex: e-123" value="{{old('signature')}}">
                            </div>
                            <div class="form-group">
                                <label for="logo" class="form-label">Logo<span class="text-danger">*</span></label>
                                <input type="file" id="logo" name="logo" class="form-control" placeholder="Ex: e-123" value="{{old('logo')}}">
                            </div>

                            <div class="form-group">
                                <label for="expiry_date" class="form-label">Expiry date<span class="text-danger">*</span></label>
                                <input required type="datetime-local" id="expiry_date" name="expiry_date" class="form-control" value="{{old('expiry_date')}}">
                            </div>
                            <div class="form-group">
                                <label for="limit" class="form-label">Limit No:<span class="text-danger">*</span></label>
                                <input type="number" id="limit" name="limit" class="form-control" placeholder="Ex: 123" value="{{old('limit')}}">
                            </div>

                        </div>
                        <!--  End left side  --> 
                        <div class="col-6">
                            
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="01795xxxxxx" value="{{old('phone')}}" required data-parsley-type="number" data-parsley-type-message="Please enter a valid number address" data-parsley-error-message="Invalid number address" >
                                @if($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
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
                        <label for="note" class="form-label">Note<span class="text-danger">*</span></label>
                        <input type="text" name="note" class="form-control" placeholder="Ex: e-123" value="{{old('note')}}">
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
                        <div class="card-title float-none">
                            <div class="text-right">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">+ Add Institutes</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Data table on -->
                        <div class="table-responsive">
                            <table id="institutesData" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Logo</th>
                                        <th>Institutes</th>
                                        <th>Head Sir info.</th>
                                        <th>Roles & Expiry</th>
                                        <th>Image</th>
                                        <th>Signature</th>
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
    <script>
        // create onchange event listener for image input
        document.getElementById('image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in institutes_image_preview
                document.getElementById('institutes_image_preview').src = URL.createObjectURL(file)
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
                            $("#institutesData").DataTable().ajax.reload();
                            // Reset form
                            $("#institutesAddForm").trigger("reset");// $(this).trigger('reset');
                            $("#institutesAddForm .close").click();// close Modal
                            // Display toast message
                            // toast('New Institutes added successfully!','success');
                            $('.toast').toast('show');
                            $('.toast-body').html(`<div class="text-success">New Institutes added successfully!</div>`);
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


            // Show Institutes with Yajra DataTable
            let table = $('#institutesData').DataTable({
                responsive:true, processing:true, serverSide:true, autoWidth:false,
                ajax:"{{route('ins.institutes')}}",
                columns:[
                    {data:'id', name:'id'},
                    {data:'logo', name:'logo'},
                    {data:'department', name:'department'},
                    {data:'user_name', name:'user_name'},
                    {data:'roles', name:'roles'},
                    {data:'img', name:'img'},
                    {data:'signature', name:'signature'},
                    {data:'action', name:'action'},
                ],
                order:[[0,"desc"]]
            });

            // Delete Institutes javaScript
            $('body').on('click', '#btnDel', function(){
                //confirmation
                let id = $(this).data("id");
                if(confirm('Delete Data '+id+'?')==true){
                    //execute delete
                    let route = "{{route('ins.destroy.institutes', ':id')}}";
                    route = route.replace(':id', id);
                    $.ajax({
                        url:route,
                        type:"delete",
                        success:function(res){
                            // console.log(res);
                            $("#institutesData").DataTable().ajax.reload();
                        },
                        error:function(res){
                            $("#errorBox").html('<div class="alert alert-danger">'+res.message+'</div>');
                        },
                    });
                } else {
                    // do nothing
                }

            });


        });
    </script>
@stop
@section('plugins.Datatables', true)
@section('plugins.Select2', true)
@section('plugins.Parsley', true)


