
<div class="row">
    <div class="col-md-3">

        <div class="form-group">
            <h5>{{$institute->name}}</h5>
        </div>

        <div class="form-group">
            <label for="user_id" class="form-label">Head sir Name</label>
            
            <p>User Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            
        </div>

        <div class="form-group">
            <h5>{{$institute->address}}</h5>
        </div>


    </div>
    <!-- End 1st side  -->

    <div class="col-md-3">

        <div class="form-group">
            <img id="institutes_image_preview" alt="institutes image" width="200"
            src="{{ $institute->signature ? Storage::url($institute->signature) : 'http://localhost:8000/vendor/adminlte/dist/img/vir-za_fb.png' }}"
             />
        </div>

        <div class="form-group">
            <label for="logo" class="form-label">Logo<span class="text-danger">*</span></label>
            
            <img id="institutes_image_preview" class="h-64 w-128 object-cover rounded-md"
            src="{{ $institute->logo ? Storage::url($institute->logo) : 'http://localhost:8000/vendor/adminlte/dist/img/vir-za_fb.png' }}"
            alt="institutes image" width="200" />
        </div>
        <div class="form-group">
            <label for="expiry_date" class="form-label">expiry date<span class="text-danger">*</span></label>
            <h5>{{$institute->expiry_date}}</h5>
        </div>

    </div>
    <!--  End 3rd side  -->
    <div class="col-md-3">

        <div class="form-group">
            <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
            <h5>{{$institute->phone}}</h5>
        </div>
        <div class="form-group">
            <label for="note" class="form-label">note<span class="text-danger">*</span></label>
            <h5>{{$institute->note}}</h5>
        </div>

        <div class="form-group">
            <label for="limit" class="form-label">Limit<span class="text-danger">*</span></label>
            <h5>{{$institute->limit}}</h5>
        </div>

        <div class="form-group">
            <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
            <h5>{{$institute->status}}</h5>
        </div>

    </div>
    <!-- End 4th side  -->
    <div class="col-md-3">

        <div class="form-group">
            <label for="image" class="form-label">Image </label>
            
            <img id="institutes_image_preview" class="h-64 w-128 object-cover rounded-md"
            src="{{ $institute->image ? Storage::url($institute->image) : 'http://localhost:8000/vendor/adminlte/dist/img/vir-za_fb.png' }}"
            alt="institutes image" width="200" />
        </div>


    </div>
    <!-- End 2nd side  -->
</div>
