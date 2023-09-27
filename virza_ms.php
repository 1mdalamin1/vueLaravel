<?php 
/* 
https://fontawesome.com/v4/icons/

#vue ui 1-8> frontend || 9-34> backend   php artisan migrate:fresh --seed
vue create library_frontend => 
cd library_frontend => 
npm install vuex@next --save => 
npm install vue-router@4 => 
npm install => 
npm run serve => 

composer create-project --prefer-dist laravel/laravel:^10 laravel10
composer create-project --prefer-dist laravel/laravel virza_ms

cd virza_ms
composer require laravel/passport  --with-all-dependencies
php artisan migrate
php artisan passport:install

composer require jeroennoten/laravel-adminlte |=> https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Installation
php artisan adminlte:install
php artisan adminlte:install --only=main_views

php artisan make:controller DashboardController -r
php artisan make:controller PermissionsController -r

composer require spatie/laravel-permission |=> https://spatie.be/docs/laravel-permission/v5/installation-laravel
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate

composer require realrashid/sweet-alert |=> https://realrashid.github.io/sweet-alert/install

php artisan sweetalert:publish |=> https://realrashid.github.io/sweet-alert/config
composer require yajra/laravel-datatables-oracle:"^10.0" |=> https://yajrabox.com/docs/laravel-datatables/master/installation
@section('plugins.Datatables', true) |=> 
php artisan adminlte:plugins install --plugin=datatables |=> https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
 |=>  
 |=> 
php artisan make:command CreateRoutePermissionsCommand
php artisan permission:generate


php artisan make:controller RolesController -r
php artisan make:controller UsersController -r

php artisan adminlte:plugins install --plugin=select2             

php artisan make:seeder CreateSuperUserSeeder



php artisan optimize:clear
php artisan route:clear
php artisan config:clear
php artisan cache:clear

php artisan serve

// php artisan migrate:fresh --seed
php artisan migrate:fresh
php artisan permission:generate
php artisan db:seed













9:25s | https://www.youtube.com/watch?v=vAx7ZFUVrSY&list=PLbC4KRSNcMno2lP3Q7W3ZvS6NAeP6xut5&index=31

php artisan make:migration create_designation_table
php artisan make:controller Hrm/DesignationController -r
php artisan make:model Designation

php artisan make:migration create_employees_table
php artisan migrate
php artisan make:controller Hrm/EmployeeController -r
php artisan make:model Employee
php artisan storage:link





php artisan route:list 





*/











; ?>

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

