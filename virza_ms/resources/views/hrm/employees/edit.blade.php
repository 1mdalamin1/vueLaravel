
@extends('adminlte::page')

@section('title', 'Update Depertment/Class | Dashboard')

@section('content_header')
    <h1>Update Depertment/Class</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="errorBox"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">

                <form action="{{route('hrm.update.designation', $designation->id)}}" method="POST">
                    <!-- @method('patch') -->
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Update Depertment/Class</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class="form-label">Depertment/Class <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="designation_name" value="{{ $designation->designation_name }}">

                                @if($errors->has('designation_name'))
                                    <span class="text-danger">{{ $errors->first('designation_name') }}</span>
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



