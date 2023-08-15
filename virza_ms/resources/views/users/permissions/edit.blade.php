@extends('adminlte::page')

@section('title', 'Edit Permissions | Dashboard')

@section('content_header')
    <h1>Update Permissions</h1>
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
                <form action="{{route('users.permissions.update', $permission->id)}}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Update</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Permission Name" value="{{$permission->name}}">

                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
@stop


