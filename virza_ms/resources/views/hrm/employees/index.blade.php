@extends('adminlte::page')

@section('title', '| Dashboard')

@section('content_header')
    <h1>Employee</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="errorBox"></div>
            </div>
        </div>


  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+ Add Employee</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <form action="{{route('hrm.store.employee')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Employee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col-6">
                            
                    <div class="form-group">
                        <label for="employee_id" class="form-label">Employee Id<span class="text-danger">*</span></label>
                        <input type="text" name="employee_id" class="form-control" placeholder="Ex: e-123" value="{{old('employee_id')}}">
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
                        <select class="form-control multiple-not " id="department_id" data-placeholder="Select a department" name="department_id">
                        @foreach ($depertments as $role)
                            <option value="{{$role->id}}">{{$role->designation_name}}</option>
                        @endforeach
                        </select>
                    </div>

                </div>
                <!-- End left side  -->
                <div class="col-6">

                    <div class="form-group">
                        <label for="image" class="form-label">image<span class="text-danger">*</span></label>
                        <input type="file" id="image" name="image" class="form-control" placeholder="Ex: e-123" value="{{old('image')}}">
                        

                        @if($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <img id="employee_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ old('image') ? Storage::url(old('image')) : '' }}" alt="Employee image preview" />
                    <!-- <img id="featured_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($post) ? Storage::url($post->featured_image) : '' }}" alt="Featured image preview" /> -->

                    <!-- {{ session('imagePath') }} -->

                </div>
                <!-- End Right side side  -->
            </div>

            <div class="row">
                <div class="col-6">

                    <div class="form-group">
                        <label for="blood" class="form-label">Blood Group<span class="text-danger">*</span></label>
                        <input type="text" id="blood" name="blood" class="form-control" placeholder="Ex: e-123" value="{{old('blood')}}">
                        @if($errors->has('blood'))
                            <span class="text-danger">{{ $errors->first('blood') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="joining_date" class="form-label">Joining date<span class="text-danger">*</span></label>
                        <input type="date" id="joining_date" name="joining_date" class="form-control" placeholder="Ex: e-123" value="{{old('joining_date')}}">
                        @if($errors->has('joining_date'))
                            <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="dob" class="form-label">Date of barth<span class="text-danger">*</span></label>
                        <input type="date" id="dob" name="dob" class="form-control" placeholder="Ex: e-123" value="{{old('dob')}}">
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
                <div class="col-6">
                    
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="01795xxxxxx" value="{{old('phone')}}">
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
            </div>
                
            <div class="form-group">
                <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                <input type="text" name="address" class="form-control" placeholder="Ex: e-123" value="{{old('address')}}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>

    </form>
      
    </div>
  </div>
  


        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="{{route('hrm.store.employee')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Add New</h5>
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                            
                                    <div class="form-group">
                                        <label for="employee_id" class="form-label">Employee Id<span class="text-danger">*</span></label>
                                        <input type="text" name="employee_id" class="form-control" placeholder="Ex: e-123" value="{{old('employee_id')}}">
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
                                        <select class="form-control multiple-not " id="department_id" data-placeholder="Select a department" name="department_id">
                                        @foreach ($depertments as $role)
                                            <option value="{{$role->id}}">{{$role->designation_name}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                </div>
                                <!-- End left side  -->
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="image" class="form-label">image<span class="text-danger">*</span></label>
                                        <input type="file" id="image" name="image" class="form-control" placeholder="Ex: e-123" value="{{old('image')}}">
                                        

                                        @if($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                    <img id="employee_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ old('image') ? Storage::url(old('image')) : '' }}" alt="Employee image preview" />
                                    <!-- <img id="featured_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($post) ? Storage::url($post->featured_image) : '' }}" alt="Featured image preview" /> -->

                                    <!-- {{ session('imagePath') }} -->

                                </div>
                                <!-- End Right side side  -->
                            </div>

                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="blood" class="form-label">Blood Group<span class="text-danger">*</span></label>
                                        <input type="text" id="blood" name="blood" class="form-control" placeholder="Ex: e-123" value="{{old('blood')}}">
                                        @if($errors->has('blood'))
                                            <span class="text-danger">{{ $errors->first('blood') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="joining_date" class="form-label">Joining date<span class="text-danger">*</span></label>
                                        <input type="date" id="joining_date" name="joining_date" class="form-control" placeholder="Ex: e-123" value="{{old('joining_date')}}">
                                        @if($errors->has('joining_date'))
                                            <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="dob" class="form-label">Date of barth<span class="text-danger">*</span></label>
                                        <input type="date" id="dob" name="dob" class="form-control" placeholder="Ex: e-123" value="{{old('dob')}}">
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
                                <div class="col-6">
                                    
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="01795xxxxxx" value="{{old('phone')}}">
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
                            </div>
                                
                            <div class="form-group">
                                <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" placeholder="Ex: e-123" value="{{old('address')}}">
                                @if($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
            
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>list</h5><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+ Add Employee</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Data table on -->
                        <div class="table-responsive">
                            <table id="employeeData" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Depertment</th>
                                        <th>Employee</th>
                                        <th>Roles & Join</th>
                                        <th>img</th>
                                        <th>Salary</th>
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
                // if there is an image, create a preview in employee_image_preview
                document.getElementById('employee_image_preview').src = URL.createObjectURL(file)
            }
        }

        $(function (){
            $('#department_id, #user_id').select2();
        });

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
                
            let table = $('#employeeData').DataTable({
                responsive:true, processing:true, serverSide:true, autoWidth:false,
                ajax:"{{route('hrm.employee')}}",
                columns:[
                    {data:'id', name:'id'},
                    {data:'department', name:'department'},
                    {data:'user_name', name:'user_name'},
                    {data:'roles', name:'roles'},
                    {data:'img', name:'img'},
                    {data:'salary', name:'salary'},
                    {data:'action', name:'action'},
                ],
                order:[[0,"desc"]]
            });

            
            $('body').on('click', '#btnDel', function(){
                //confirmation
                let id = $(this).data("id");
                if(confirm('Delete Data '+id+'?')==true){
                    //execute delete
                    let route = "{{route('hrm.destroy.employee', ':id')}}";
                    route = route.replace(':id', id);
                    $.ajax({
                        url:route,
                        type:"delete",
                        success:function(res){
                            // console.log(res);
                            $("#employeeData").DataTable().ajax.reload();
                        },
                        error:function(res){
                            $("#errorBox").html('<div class="alert alert-danger">'+res.message+'</div>')
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


