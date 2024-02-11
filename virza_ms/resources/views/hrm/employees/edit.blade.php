
@extends('adminlte::page')

@section('title', 'Update Employee | Dashboard')

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

                <form action="{{route('hrm.update.employee', $employee->id)}}" method="POST" enctype="multipart/form-data">
                    
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Update Employee</h5>
                                <a href="{{route('hrm.employee')}}"><<==<< Go Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-3">
                                            
                                    <div class="form-group">
                                        <label for="employee_id" class="form-label">Employee Id<span class="text-danger">*</span></label>
                                        <input type="text" name="employee_id" class="form-control" placeholder="Ex: e-123" value="{{$employee->employee_id}}">
                                        @if($errors->has('employee_id'))
                                            <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="user_id" class="form-label">Name</label>
                                        <select class="form-control multiple-not " id="user_id" data-placeholder="Select a department" name="user_id">
                                        @foreach ($users as $role)
                                            <option value="{{$role->id}}" {{$employee->user_id == $role->id ? "selected" : ""}} >{{$role->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="department_id" class="form-label">Depertments</label>
                                        <select class="form-control" multiple="multiple" id="department_id" data-placeholder="Select a department" name="department_id[]">
                                        @foreach ($depertments as $role)
                                            <option value="{{$role->id}}" {{$employee->department_id == $role->id ? "selected" : ""}} >{{$role->designation_name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                                        <input type="text" name="address" class="form-control" placeholder="Ex: e-123" value="{{$employee->address}}">
                                        @if($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>


                                </div>
                                <!-- End 1st side  -->
                            
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label for="blood" class="form-label">Blood Group<span class="text-danger">*</span></label>
                                        <input type="text" id="blood" name="blood" class="form-control" placeholder="Ex: e-123" value="{{$employee->blood}}">
                                        @if($errors->has('blood'))
                                            <span class="text-danger">{{ $errors->first('blood') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="joining_date" class="form-label">Joining date<span class="text-danger">*</span></label>
                                        <input type="date" id="joining_date" name="joining_date" class="form-control" placeholder="Ex: e-123" value="{{$employee->joining_date}}">
                                        @if($errors->has('joining_date'))
                                            <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="dob" class="form-label">Date of barth<span class="text-danger">*</span></label>
                                        <input type="date" id="dob" name="dob" class="form-control" placeholder="Ex: e-123" value="{{$employee->dob}}">
                                        @if($errors->has('dob'))
                                            <span class="text-danger">{{ $errors->first('dob') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                        <select class="form-control multiple-not " id="gender" data-placeholder="Select a gender" name="gender">
                                            <option value="Male" {{$employee->gender === "Male" ? "selected" : ""}} >Male</option>
                                            <option value="Female" {{$employee->gender === "Female" ? "selected" : ""}} >Female</option>
                                            <option value="Other" {{$employee->gender === "Other" ? "selected" : ""}} >Other</option>
                                        </select>
                                    </div>

                                </div>
                                <!--  End 3rd side  --> 
                                <div class="col-md-3">
                                    
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="01795xxxxxx" value="{{$employee->phone}}">
                                        @if($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="nid" class="form-label">Nid<span class="text-danger">*</span></label>
                                        <input type="text" id="nid" name="nid" class="form-control" placeholder="Ex: e-123" value="{{$employee->nid}}">
                                        @if($errors->has('nid'))
                                            <span class="text-danger">{{ $errors->first('nid') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="salary" class="form-label">Salary<span class="text-danger">*</span></label>
                                        <input type="text" id="salary" name="salary" class="form-control" placeholder="Ex: e-123" value="{{$employee->salary}}">
                                        @if($errors->has('salary'))
                                            <span class="text-danger">{{ $errors->first('salary') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                        <select class="form-control multiple-not " id="status" data-placeholder="Select a status" name="status">
                                            <option value="Active" {{$employee->status === "Active" ? "selected" : ""}} >Active</option>
                                            <option value="inActive" {{$employee->status === "inActive" ? "selected" : ""}} >inActive</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- End 4th side  -->
                                <div class="col-md-3">

                                <div class="form-group">
                                    <label for="image" class="form-label">Image </label>
                                    <input type="file" id="image" name="image" class="form-control" value="{{$employee->image}}">
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                    <img id="employee_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ $employee->image ? Storage::url($employee->image) : 'http://localhost:8000/vendor/adminlte/dist/img/vir-za_fb.png' }}" alt="Employee image"  width="200" />
                                
                                <!-- {{ session('imagePath') }} -->

                                </div>
                                <!-- End 2nd side  -->
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
            $('#department_id').select2();
        });

    </script>
@stop
@section('plugins.Select2', true)


