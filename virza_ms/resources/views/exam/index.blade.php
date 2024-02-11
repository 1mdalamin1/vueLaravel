@extends('adminlte::page')

@section('title', 'Exams | Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between flex-wrap">
        <!-- <h1>Exams list</h1> -->
                
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
            <div class="modal-dialog modal-dialog-scrollable">
            <!-- Modal content-->
            <div class="modal-content">
            
                <div class="modal-header">
                <h4 class="modal-title">Add New Exam</h4>
                <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form id="examAddForm" data-parsley-validate action="{{route('exams.store.exam')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                    <div class="row">
                        <div class="col-md-6">
                                                                
                            <div class="form-group">
                                <label for="exam_name" class="form-label">Exams name<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="Exams name is required" type="text" name="name" class="form-control" placeholder="Exam name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                <select class="form-control multiple-not " id="status" data-placeholder="Select a status" name="status">
                                    <option value="Active">Active</option>
                                    <option value="inActive">inActive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                                                                
                            <div class="form-group">
                                <label for="note" class="form-label">Note<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="note is required" type="text" name="note" class="form-control" placeholder="Exam note" value="{{old('note')}}">
                            </div>
                        </div>
                        <!-- End left side  -->
                        <!-- End Right side side  -->
                    </div>

                    <div id="errorExamsFromBox"></div>
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
                                <h2>Exams list</h2>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">+ Add Exams</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Data table on -->
                        <div class="table-responsive">
                            <table id="examData" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Logo</th>
                                        <th>Exams</th>
                                        <th>Note</th>
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
                $('#examAddForm').parsley();

                // Add an event listener for form submission
                $('#examAddForm').on('submit', function(event){
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
                            $("#errorExamsFromBox").html('');
                            $("#examData").DataTable().ajax.reload();
                            // Reset form
                            $("#examAddForm").trigger("reset");// $(this).trigger('reset');
                            $("#examAddForm .close").click();// close Modal
                            // Display toast message
                            // toast('New Exams added successfully!','success');
                            $('.toast').toast('show');
                            $('.toast-body').html(`<div class="text-success">New Exams added successfully!</div>`);
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
                            $("#errorExamsFromBox").html(`<div class="alert alert-danger">${htmlErrors}</div>`);

                        }
                    });
                });
            });


            // Show Exams with Yajra DataTable
            let table = $('#examData').DataTable({
                responsive:true, processing:true, serverSide:true, autoWidth:false,
                ajax:"{{route('exams.exam')}}",
                columns:[
                    {data:'id', name:'id'},
                    {data:'logo', name:'logo'},
                    {data:'exams', name:'exams'},
                    {data:'note', name:'note'},
                    {data:'action', name:'action'},
                ],
                order:[[0,"desc"]]
            });

            // Delete Exams javaScript
            $('body').on('click', '#btnDel', function(){
                //confirmation
                let id = $(this).data("id");
                if(confirm('Delete Data '+id+'?')==true){
                    //execute delete
                    let route = "{{route('exams.destroy.exam', ':id')}}";
                    route = route.replace(':id', id);
                    $.ajax({
                        url:route,
                        type:"delete",
                        success:function(res){
                            // console.log(res);
                            $("#examData").DataTable().ajax.reload();
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


