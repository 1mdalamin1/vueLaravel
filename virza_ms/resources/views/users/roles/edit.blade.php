@extends('adminlte::page')

@section('title', 'Update Roles | Dashboard')

@section('content_header')
    <h1>Update Roles</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="errorBox"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <form action="{{route('users.roles.update', $role->id)}}" method="POST">
                    @method('patch')
                    @csrf
                <div class="card">
                    
                    <div class="card-body">
                        <div class="fprm-group">
                            <label for="name" class="from-label">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="For e.g. Manager" value="{{ucfirst($role->name)}}" id="name">
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <label for="name" class="from-label">Assing Permission <span class="text-danger">*</span></label>
                        <!-- Data table on -->
                        <div class="table-responsive">
                            <table id="tblData" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>

                                        </th>
                                        <th>Name</th>
                                        <th>Guard</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <!-- Data table off -->
                    </div>
                    <div class="card-footer"><button type="submit" class="btn btn-primary">Save Role</button></div>
                </div>

                </form>


            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
        $(document).ready(function(){
            // check uncheck all function
            $("#all_permission").on('click', function(){
                if($(this).is(":checked")){
                    $.each($('.permission'), function(){
                        if ($(this).val() !="dashboard") {
                            $(this).prop('checked', true);
                        }
                    });
                } else {
                    $.each($('.permission'), function(){
                        if ($(this).val() !="dashboard") {
                            $(this).prop('checked', false);  
                        }
                    });
                }
            });
            let table = $('#tblData').DataTable({
                responsive:true, processing:true, serverSide:true, autoWidth:false, bPaginate:false, bFilter:false,
                ajax:"{{route('users.permissions.index', ['role_id'=>$role->id])}}",
                columns:[
                    {data:'chkBox', name:'chkBox', orderable:false, searchable:false, className:'text-center'},
                    {data:'name', name:'name'},
                    {data:'guard_name', name:'guard_name'},
                ],
                order:[[0,"desc"]]
            });
        });
    </script>
@stop
@section('plugins.Datatables', true)

