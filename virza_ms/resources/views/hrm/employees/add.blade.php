@extends('adminlte::page')

@section('title', 'Employee | Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between flex-wrap">
        <h1>Add Employee in list</h1>
                
        <div class=" ">
            <a href="{{ url('/hrm/employee') }}" class="btn btn-info btn-sm"><<==<< Go Back Employee</a>
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

<!-- from on -->
<div class="row">
    <div class="col-12">
        <form id="employeeAddForm" data-parsley-validate action="{{route('hrm.store.employee')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <!-- <div class="card-header">
                    <div class="card-title">
                        <h5>Add New</h5>

                    </div>
                </div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="employee_id" class="form-label">Employee Id<span class="text-danger">*</span></label>
                                <input required data-parsley-required-message="Employee Id is required" type="text" name="employee_id" class="form-control" placeholder="Ex: e-123" value="{{old('employee_id')}}" >
                                @if($errors->has('employee_id'))
                                    <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                @endif
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
                                    
                            <div class="form-group">
                                <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" placeholder="Ex: e-123" value="{{old('address')}}">
                                @if($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            
                        </div>
                        <!-- End left side  -->
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="blood" class="form-label">Blood Group<span class="text-danger">*</span></label>
                                <input required type="text" id="blood" name="blood" class="form-control" placeholder="Ex: e-123" value="{{old('blood')}}">
                                @if($errors->has('blood'))
                                    <span class="text-danger">{{ $errors->first('blood') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="joining_date" class="form-label">Joining date<span class="text-danger">*</span></label>
                                <input required type="date" id="joining_date" name="joining_date" class="form-control" placeholder="Ex: e-123" value="{{old('joining_date')}}">
                                @if($errors->has('joining_date'))
                                    <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="dob" class="form-label">Date of barth<span class="text-danger">*</span></label>
                                <input required type="date" id="dob" name="dob" class="form-control" placeholder="Ex: e-123" value="{{old('dob')}}">
                                @if($errors->has('dob'))
                                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                                @endif
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
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="01795xxxxxx" value="{{old('phone')}}" required data-parsley-type="number" data-parsley-type-message="Please enter a valid number address" data-parsley-error-message="Invalid number address">
                                @if($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nid" class="form-label">Nid<span class="text-danger">*</span></label>
                                <input type="text" id="nid" name="nid" class="form-control" placeholder="Ex: e-123" value="{{old('nid')}}">
                                @if($errors->has('nid'))
                                    <span class="text-danger">{{ $errors->first('nid') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="salary" class="form-label">Salary<span class="text-danger">*</span></label>
                                <input type="text" id="salary" name="salary" class="form-control" placeholder="Ex: e-123" value="{{old('salary')}}">
                                @if($errors->has('salary'))
                                    <span class="text-danger">{{ $errors->first('salary') }}</span>
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
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="image" class="form-label">image<span class="text-danger">*</span></label>
                                <input type="file" id="image" name="image" class="form-control" placeholder="Ex: e-123" value="{{old('image')}}">


                                @if($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <img id="employee_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ old('image') ? Storage::url(old('image')) : '' }}" alt="Employee image preview" width="150" />

                        </div>
                            <!-- End Right side side  -->
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- from off -->


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
                // if there is an image, create a preview in employee_image_preview
                document.getElementById('employee_image_preview').src = URL.createObjectURL(file)
            }
        }
        
        $(function (){
            $('#department_id, #user_id').select2();
        });

        $(document).ready(function(){
            $('#employeeAddForm').parsley();
        });

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
@stop
@section('plugins.Select2', true)
@section('plugins.Parsley', true)


