
@extends('adminlte::page')

@section('title', 'Update institutes | Dashboard')

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

                <form action="{{route('ins.update.institutes', $institutes->id)}}" method="POST" enctype="multipart/form-data">
                    
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Update institutes</h5>
                                <a href="{{route('ins.institutes')}}"><<--<< Go Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-3">
                                            
                                    <div class="form-group">
                                        <label for="institutes_name" class="form-label">Institutes name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="Ex: e-123" value="{{$institutes->name}}">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="user_id" class="form-label">Head sir Name</label>
                                        <select class="form-control multiple-not " id="user_id" data-placeholder="Select a department" name="user_id">
                                        @foreach ($users as $role)
                                            <option value="{{$role->id}}" {{$institutes->user_id == $role->id ? "selected" : ""}} >{{$role->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                                        <input type="text" name="address" class="form-control" placeholder="Ex: e-123" value="{{$institutes->address}}">
                                        @if($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>


                                </div>
                                <!-- End 1st side  -->
                            
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label for="signature" class="form-label">signature<span class="text-danger">*</span></label>
                                        <input type="file" id="signature" name="signature" class="form-control" placeholder="Ex: e-123" value="{{$institutes->signature}}">
                                        @if($errors->has('signature'))
                                            <span class="text-danger">{{ $errors->first('signature') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="logo" class="form-label">Logo<span class="text-danger">*</span></label>
                                        <input type="file" id="logo" name="logo" class="form-control" placeholder="Ex: e-123" value="{{$institutes->logo}}">
                                        @if($errors->has('logo'))
                                            <span class="text-danger">{{ $errors->first('logo') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="expiry_date" class="form-label">expiry date<span class="text-danger">*</span></label>
                                        <input type="datetime-local" id="expiry_date" name="expiry_date" class="form-control" value="{{$institutes->expiry_date}}">
                                        @if($errors->has('expiry_date'))
                                            <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <!--  End 3rd side  --> 
                                <div class="col-md-3">
                                    
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="01795xxxxxx" value="{{$institutes->phone}}">
                                        @if($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="note" class="form-label">note<span class="text-danger">*</span></label>
                                        <input type="text" id="note" name="note" class="form-control" placeholder="Ex: e-123" value="{{$institutes->note}}">
                                        @if($errors->has('note'))
                                            <span class="text-danger">{{ $errors->first('note') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="limit" class="form-label">Limit<span class="text-danger">*</span></label>
                                        <input type="number" id="limit" name="limit" class="form-control" placeholder="Ex: e-123" value="{{$institutes->limit}}">
                                        @if($errors->has('limit'))
                                            <span class="text-danger">{{ $errors->first('limit') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                        <select class="form-control multiple-not " id="status" data-placeholder="Select a status" name="status">
                                            <option value="Active" {{$institutes->status === "Active" ? "selected" : ""}} >Active</option>
                                            <option value="inActive" {{$institutes->status === "inActive" ? "selected" : ""}} >inActive</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- End 4th side  -->
                                <div class="col-md-3">

                                <div class="form-group">
                                    <label for="image" class="form-label">Image </label>
                                    <input type="file" id="image" name="image" class="form-control" value="{{$institutes->image}}">
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                    <img id="institutes_image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ $institutes->image ? Storage::url($institutes->image) : 'http://localhost:8000/vendor/adminlte/dist/img/vir-za_fb.png' }}" alt="institutes image"  width="200" />
                                
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
                // if there is an image, create a preview in institutes_image_preview
                document.getElementById('institutes_image_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
@stop


