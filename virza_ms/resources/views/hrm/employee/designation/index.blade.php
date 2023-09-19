@extends('adminlte::page')

@section('title', 'Depertment/Class | Dashboard')

@section('content_header')
    <h1>Depertment/Class</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="errorBox"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <form action="{{route('hrm.store.designation')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Add New</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="designation_name" class="form-label">Depertment <span class="text-danger">*</span></label>
                                <input type="text" name="designation_name" class="form-control" placeholder="Enter Depertment" value="{{old('designation_name')}}">

                                @if($errors->has('designation_name'))
                                    <span class="text-danger">{{ $errors->first('designation_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Depertment list</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Data table on -->
                        <div class="table-responsive">
                            <table id="tableData" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    @php
                                    // dd($aa);
                                    @endphp

                                    @foreach ($aa as $item)


                                    <tr >
                                        <th>{{$item->id}}</th>
                                        <th>{{$item->designation_name}}</th>
                                        <th>Guard</th>
                                        <th>



                        @if(Auth::user()->can('users.permissions.edit'))
                        <a class='btn btn-xs btn-warning' id='btnEdit' href='{{route("users.permissions.edit",$item->id )}}'><i class='fas fa-edit'></i></a>
                    @endif
                    @if(Auth::user()->can('users.permissions.destroy'))
                        <button class='btn btn-xs btn-outline-danger' id='btnDel' data-id='{{$item->id}}'><i class='fas fa-trash'></i></button>
                    @endif
                </th>
                                    </tr>
                                    @endforeach
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
        });

        $(document).ready(function(){
            let table = $('#tableData').DataTable({
                responsive:true, processing:true, serverSide:true, autoWidth:false,
                ajax:"{{route('hrm.designation')}}",
                columns:[
                    {data:'id', name:'id'},
                    {data:'designation_name', name:'designation_name'},
                    {data:'guard_name', name:'guard_name'},
                    {data:'action', name:'action'},
                ],
                order:[[0,"desc"]]
            });

        /*
            $('body').on('click', '#btnDel', function(){
                //confirmation
                let id = $(this).data("id");
                if(confirm('Delete Data '+id+'?')==true){
                    //execute delete
                    let route = "{{route('users.permissions.destroy', ':id')}}";
                    route = route.replace(':id', id);
                    $.ajax({
                        url:route,
                        type:"delete",
                        success:function(res){
                            // console.log(res);
                            $("#tableData").DataTable().ajax.reload();
                        },
                        error:function(res){
                            $("#errorBox").html('<div class="alert alert-danger">'+res.message+'</div>')
                        },
                    });
                }else{
                    // do nothing
                }

            });
        */

        });
    </script>
@stop
@section('plugins.Datatables', true)

