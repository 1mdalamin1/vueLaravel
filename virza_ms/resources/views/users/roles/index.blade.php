@extends('adminlte::page')

@section('title', 'Role | Permissions | Dashboard')

@section('content_header')
    <h1>Roles</h1>
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
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Roles list</h5>
                        </div>
                        <a href="{{route('users.roles.create')}}" class="float-right btn btn-success btn-xs m-0"><i class="fas fa-plus"></i> Add</a>
                    </div>
                    <div class="card-body">
                        <!-- Data table on -->
                        <div class="table-responsive">
                            <table id="tblData" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Users</th>
                                        <th>Permissions</th>
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
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $(document).ready(function(){
        let table = $('#tblData').DataTable({
            responsive:true, processing:true, serverSide:true, autoWidth:false,
            ajax:"{{route('users.roles.index')}}",
            columns:[
                {data:'id', name:'id'},
                {data:'name', name:'name'},
                {data:'users_count', name:'users_count', className:"text-center"},
                {data:'permissions_count', name:'permissions_count', className:"text-center"},
                {data:'action', name:'action', bSortable:false, className:"text-center"},
            ],
            order:[[0,"desc"]],
            bDestory:true,
        });
        $('body').on('click', '#btnDel', function(){
            //confirmation
            let id = $(this).data("id");
            if(confirm('Delete Data '+id+'?')==true){
                //execute delete
                let route = "{{route('users.roles.destroy', ':id')}}";
                route = route.replace(':id', id);
                $.ajax({
                    url:route,
                    type:"delete",
                    success:function(res){
                        console.log(res);
                        $("#tblData").DataTable().ajax.reload();
                    },
                    error:function(res){
                        $("#errorBox").html('<div class="alert alert-danger">'+res.message+'</div>')
                    },
                });
            }else{
                // do nothing
            }
        });
    });
    </script>
@stop
@section('plugins.Datatables', true)

