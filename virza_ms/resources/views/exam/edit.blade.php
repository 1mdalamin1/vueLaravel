
@extends('adminlte::page')

@section('title', 'Update exam | Dashboard')

@section('content_header')
    <!-- <p></p> -->
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

                <form action="{{route('exams.update.exam', $exam->id)}}" method="POST" enctype="multipart/form-data">
                    
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Update exam</h5>
                                <a href="{{route('exams.exam')}}"><<--<< Go Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-3">
                                            
                                    <div class="form-group">
                                        <label for="institutes_name" class="form-label">Institutes name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="Ex: e-123" value="{{$exam->name}}">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- End 1st side  -->
                            
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label for="note" class="form-label">note<span class="text-danger">*</span></label>
                                        <input type="text" id="note" name="note" class="form-control" placeholder="Ex: e-123" value="{{$exam->note}}">
                                        @if($errors->has('note'))
                                            <span class="text-danger">{{ $errors->first('note') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <!-- End 2nd side  -->
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label for="serial_no" class="form-label">Serial no<span class="text-danger">*</span></label>
                                        <input type="text" id="serial_no" name="serial_no" class="form-control" placeholder="Ex: e-123" value="{{$exam->serial_no}}">
                                        @if($errors->has('serial_no'))
                                            <span class="text-danger">{{ $errors->first('serial_no') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <!-- End 3rd side  -->
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                        <select class="form-control multiple-not " id="status" data-placeholder="Select a status" name="status">
                                            <option value="Active" {{$exam->status === "Active" ? "selected" : ""}} >Active</option>
                                            <option value="inActive" {{$exam->status === "inActive" ? "selected" : ""}} >inActive</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- End 4th side  -->
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



