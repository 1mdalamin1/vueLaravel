<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Institution;
use Yajra\DataTables\DataTables;
use Image;

class InstitutionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {        
        if($request->ajax())
        {
            return $this->getInstitutions(); // $request->role_id
        }
            
        //    dd($request);
        //    return redirect()->route('ins.institutes')->with('success', 'Institution added successfully')->with('imagePath', $request);
        // {{ session('imagePath') }} // use this in blade.php

        return view('school.index')->with([
            "users" => User::get()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // validation 
        $validated=$this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'limit' => 'required',
            'user_id' => 'required',
            'expiry_date' => 'required',
            'note' => 'required',
            'status' => 'required',
        ]);
        $currentUserId = Auth::user()->id;
        $filePath="images/a.png";
        if ($request->hasFile('image')) {
                // put image in the public storage
            $filePath = Storage::disk('public')->put('images/institutes', request()->file('image'));
            //    $validated['image'] = $filePath;
        }

        $logoPath="images/a.png";
        if ($request->hasFile('logo')) {
                // put image in the public storage
            $logoPath = Storage::disk('public')->put('images/institutes', request()->file('logo'));
            //    $validated['image'] = $filePath;
        }

        $signaturePath="images/a.png";
        if ($request->hasFile('signature')) {
                // put image in the public storage
            $signaturePath = Storage::disk('public')->put('images/institutes', request()->file('signature'));
            //    $validated['image'] = $filePath;
        }

        if($validated){
            $addInstitutions = Institution::create([
                'name' => trim($request->name),
                'logo' => $logoPath,
                'address' => trim($request->address),
                'limit' => trim($request->limit),
                'user_id' => trim($request->user_id),
                'phone' => trim($request->phone),
                'image' => $filePath,
                'expiry_date' => trim($request->expiry_date),
                'signature' => $signaturePath,
                'note' => trim($request->note),
                'created_at_id' => $currentUserId,
                'status' => trim($request->status)
            ]);
        }
        
        if ($addInstitutions) {
            toast('New Institution added successfully!','success');
            // return $this->index();
            return redirect()->route('ins.institutes')->with('success', 'Institution Add successfully');
        }
        toast('Error on saving institutes!','error');

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $institute = Institution::findOrFail($id);
    
        $user = User::find($institute->user_id); // Assuming 'user_id' is the foreign key in your institutes table

        return view('school.show', compact('institute', 'user'));
        // return view('school.show')->with('institute', $institute);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $institutes = Institution::findOrFail($id);
    
        return view('school.edit', compact('institutes'))->with([
            "users" => User::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $institutes = Institution::findOrFail($id);

        $request->validate([
            'address' => 'required|string|max:255'.$id,
            'user_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'limit' => 'required',
            'expiry_date' => 'required',
            'note' => 'required',
            'status' => 'required',
        ]);

        
        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($institutes->image);

            $filePath = Storage::disk('public')->put('images/institutes', request()->file('image'), 'public');
            // $validated['image'] = $filePath;
        } else {
            $filePath = $institutes->image;
        }
        
        if ($request->hasFile('logo')) {
            // delete logo
            Storage::disk('public')->delete($institutes->logo);

            $logoPath = Storage::disk('public')->put('images/institutes', request()->file('logo'), 'public');
            // $validated['logo'] = $logoPath;
        } else {
            $logoPath = $institutes->logo;
        }
        
        if ($request->hasFile('signature')) {
            // delete signature
            Storage::disk('public')->delete($institutes->signature);

            $signaturePath = Storage::disk('public')->put('images/institutes', request()->file('signature'), 'public');
            // $validated['signature'] = signatureePath;
        } else {
            $signaturePath = $institutes->signature;
        }

        $schoolUpdate = $institutes->update([
            'address' => $request->input('address'),
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'limit' => $request->input('limit'),
            'expiry_date' => $request->input('expiry_date'),
            'note' => $request->input('note'),
            'status' => $request->input('status'),
            'image' => $filePath,
            'logo' => $logoPath,
            'signature' => $signaturePath,
        ]);

        if ($schoolUpdate) {
            toast('Institutes Updated successfully!','success');
            // return $this->index();
            return redirect()->route('ins.institutes')->with('success', 'institutes updated successfully');
            // return view('ins.institutes.institutes.index');
        }
        toast('Error on updated school!','error');

        return back()->withInput();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $institutes = Institution::findOrFail($id);
    
        Storage::disk('public')->delete($institutes->image);
        Storage::disk('public')->delete($institutes->logo);
        Storage::disk('public')->delete($institutes->signature);

        if($institutes->delete()){
            toast('institutes Deleted Successfully!','success');
            return response(["message" => "Institution Deleted Successfully"], 200);
        }
    
        return response(["message" => "Institution Delete Error! Please try again"], 201);
    }
    
    
    private function getInstitutions()
    {
        $data = Institution::with(['user', 'user.roles'])->get();

        return DataTables::of($data)
            ->addColumn('user_name', function($row) {
                $info = "";
                $info .= '<b>'.ucfirst($row->user->name).'</b>';
                $info .= '<p>'.$row->user->email.'</p>';
                return $info;
            })
            ->addColumn('department', function($row) {
                $dep = '';
                $dep .= '<b>'.$row->name.'</b>';
                $dep .= '<p>'.$row->address.'</p>';
                return $dep;
            })
            ->addColumn('email', function($row) {
                return $row->user->email;
            })
            ->addColumn('roles', function($row) {
                $joinDate = Carbon::parse($row->expiry_date)->format('d M Y H:i A');
                $role = "";
                if ($row->user->roles != null) {
                    foreach ($row->user->roles as $next) {
                        $role .= '<span class="badge badge-primary">' . ucfirst($next->name) . '</span> ';
                    }
                }
                $role .= '<p class=""><b>'.$joinDate.'</b></p> ';
                return $role;
            })
            
            ->addColumn('logo', function($row) {
                $image = "";
                if($row->logo){
                    $image .= '<img class="institutes-img" style="width:70px;" src="'.Storage::url($row->logo).'" alt="'.$row->name.'" srcset="">';
                } else {
                    $image .= '<svg xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z"/></svg>';
                }
                return $image;
            })
            ->addColumn('img', function($row) {
                $image = "";
                if($row->image){
                    $image .= '<img class="institutes-img" style="width:70px;" src="'.Storage::url($row->image).'" alt="'.$row->user->name.'" srcset="">';
                }
                return $image;
            })
            ->addColumn('signature', function($row) {
                $image = "";
                if($row->signature){
                    $image .= '<img class="institutes-img" style="width:70px;" src="'.Storage::url($row->signature).'" alt="'.$row->user->name.'" srcset="">'.'<p>'.$row->phone.'</p>';
                }
                return $image;
            })
            ->addColumn('date', function($row) {
                return Carbon::parse($row->created_at)->format('d M, Y h:i:s A');
            })
            ->addColumn('action', function($row) {
                $action = "";
                if (Auth::user()->can('ins.edit.institutes')) {
                    $action .= "<a class='btn btn-xs btn-warning' id='btnEdit' href='" . route('ins.edit.institutes', $row->id) . "'><i class='fas fa-edit'></i></a>";
                }
                if (Auth::user()->can('ins.show.institutes')) {
                    $action .= "<button class='btn btn-xs btn-success' id='btnShow' data-id='" . $row->id . "'  data-toggle='modal' data-target='#showModal' ><i class='fas fa-eye'></i></button>";
                    // $action .= "<a class='btn btn-xs btn-success' id='btnShow' href='" . route('ins.edit.institutes', $row->id) . "'><i class='fas fa-eye'></i></a>";
                }
                if (Auth::user()->can('ins.destroy.institutes')) {
                    $action .= " <button class='btn btn-xs btn-danger' id='btnDel' data-id='" . $row->id . "'><i class='fas fa-trash'></i></button>";
                }
                return $action;
            })
            ->rawColumns(['user_name', 'email', 'roles', 'name', 'img', 'date', 'department','signature','logo', 'action'])
            ->make('true');
    }


}

