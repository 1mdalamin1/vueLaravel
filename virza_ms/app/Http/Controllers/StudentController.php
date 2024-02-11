<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User; 
use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Institution;
use App\Models\Student;
use Yajra\DataTables\DataTables;
use Image;

class StudentController extends Controller
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
            return $this->getStudents(); // $request->role_id
        }
            
        //    dd($request);
        //    return redirect()->route('stu.student')->with('success', 'Student added successfully')->with('imagePath', $request);
        // {{ session('imagePath') }} // use this in blade.php

        return view('student.index')->with([
            "department" => Designation::get()
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
            'father' => 'required',
            'mother' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'blood' => 'required',
            'dob' => 'required',
            'session' => 'required',
            'religion' => 'required',
            'department_id' => 'required',
            'roll_no' => 'required',
        ]);
        $currentUserId = Auth::user()->id;
        $institute_id = auth()->user()->iid;
        $filePath="images/a.png";
        if ($request->hasFile('image')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('images/student', request()->file('image'));
            // $validated['image'] = $filePath;
        }

        $parts = explode('|', $request->department_id);

        $cid = trim($parts[0]);
        $c_name = trim($parts[1]);

        if($validated){
            $addStudent = Student::create([
                'name' => trim($request->name),
                'father' => trim($request->father),
                'mother' => trim($request->mother),
                'phone' => trim($request->phone),
                'email' => trim($request->email),
                'address' => trim($request->address),
                'gender' => trim($request->gender),
                'blood' => trim($request->blood),
                'dob' => trim($request->dob),
                'session' => trim($request->session),
                'religion' => trim($request->religion),
                'department_id' => $cid,
                'class_name' => $c_name,
                'roll_no' => trim($request->roll_no),
                'image' => $filePath,
                'note' => trim($request->note),
                'serial_no' => 1,
                'created_at_user_id' => $currentUserId,
                'updateted_at_id' => $currentUserId,
                'institute_id' => $institute_id,
                'status' => trim($request->status)
            ]);

            
        }
        
        if ($addStudent) {
            toast('New Student added successfully!','success');
            // return $this->index();
            return redirect()->route('stu.student')->with('success', 'Student Add successfully');
        }
        toast('Error on saving student!','error');

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $institute = Student::findOrFail($id);
    
        $user = User::find($institute->user_id); // Assuming 'user_id' is the foreign key in your student table

        return view('school.show', compact('institute', 'user'));
        // return view('school.show')->with('institute', $institute);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
    
        return view('school.edit', compact('student'))->with([
            "users" => User::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

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
            Storage::disk('public')->delete($student->image);

            $filePath = Storage::disk('public')->put('images/student', request()->file('image'), 'public');
            // $validated['image'] = $filePath;
        } else {
            $filePath = $student->image;
        }
        
        if ($request->hasFile('logo')) {
            // delete logo
            Storage::disk('public')->delete($student->logo);

            $logoPath = Storage::disk('public')->put('images/student', request()->file('logo'), 'public');
            // $validated['logo'] = $logoPath;
        } else {
            $logoPath = $student->logo;
        }
        
        if ($request->hasFile('signature')) {
            // delete signature
            Storage::disk('public')->delete($student->signature);

            $signaturePath = Storage::disk('public')->put('images/student', request()->file('signature'), 'public');
            // $validated['signature'] = signatureePath;
        } else {
            $signaturePath = $student->signature;
        }

        $schoolUpdate = $student->update([
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
            toast('student Updated successfully!','success');
            // return $this->index();
            return redirect()->route('stu.student')->with('success', 'student updated successfully');
            // return view('stu.student.student.index');
        }
        toast('Error on updated school!','error');

        return back()->withInput();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
    
        Storage::disk('public')->delete($student->image);

        if($student->delete()){
            toast('student Deleted Successfully!','success');
            return response(["message" => "Student Deleted Successfully"], 200);
        }
    
        return response(["message" => "Student Delete Error! Please try again"], 201);
    }
    
    
    private function getStudents()
    {
        $currentUserId = Auth::user()->id;
        // dd($currentUserId);
        // $employ = Employee::where('user_id', $currentUserId)->get();
        // $instuteIds = $employ->department_id;
        $institute_id = auth()->user()->iid;
        // SELECT * FROM student WHERE institute_id=1 AND department_id in (16,4);
        // $data = Student::where('institute_id', $institute_id)
        //        ->where('state', 'active')
        //        ->whereIn('class', [3, 6, 2])
        //        ->get();
        $data = Student::where('institute_id', $institute_id)->get();


        return DataTables::of($data)
            ->addColumn('name_roll', function($row) {
                $info = "";
                $info .= '<b>'.ucfirst($row->name).'</b>';
                $info .= '<p>'.$row->class_name.' | '.$row->roll_no.'</p>';
                return $info;
            })
            ->addColumn('rg_dob', function($row) {
                $dateOfBirght = Carbon::parse($row->dob)->format('d M Y H:i A');
                $dep = '';
                $dep .= '<b>'.$row->religion.' | '.$row->gender.'</b>';
                $dep .= '<p>'.$dateOfBirght.'</p>';
                return $dep;
            })
            ->addColumn('parents', function($row) {
                $pInfo = '';
                $pInfo .= '<b>'.$row->father.'</b>';
                $pInfo .= '<p>'.$row->mother.'</p>';
                return $pInfo;
            })
            ->addColumn('contact', function($row) {
                $cInfo = '';
                $cInfo .= '<b>'.$row->phone.'</b>';
                $cInfo .= '<p>'.$row->email.'</p>';
                // $cInfo .= '<b>'.$row->address.'</b>';
                return $cInfo;
            })
            
            ->addColumn('img', function($row) {
                $image = "";
                if($row->image){
                    $image .= '<img class="student-img" style="width:70px;" src="'.Storage::url($row->image).'" alt="'.$row->name.'" srcset="">';
                } else {
                    $image .= '<svg xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z"/></svg>';
                }
                return $image;
            })
            ->addColumn('addmit_date', function($row) {
                $createDage = Carbon::parse($row->created_at)->format('d M, Y h:i:s A');
                $dep = '';
                $dep .= '<b>'.$row->session.' | '.$row->status.'</b>';
                $dep .= '<p>'.$createDage.'</p>';
                return $dep;
            })
            ->addColumn('action', function($row) {
                $action = "";
                if (Auth::user()->can('stu.edit.student')) {
                    $action .= "<a class='btn btn-xs btn-warning' id='btnEdit' href='" . route('stu.edit.student', $row->id) . "'><i class='fas fa-edit'></i></a>";
                }
                if (Auth::user()->can('stu.show.student')) {
                    $action .= "<button class='btn btn-xs btn-success' id='btnShow' data-id='" . $row->id . "'  data-toggle='modal' data-target='#showModal' ><i class='fas fa-eye'></i></button>";
                    // $action .= "<a class='btn btn-xs btn-success' id='btnShow' href='" . route('stu.edit.student', $row->id) . "'><i class='fas fa-eye'></i></a>";
                }
                if (Auth::user()->can('stu.destroy.student')) {
                    $action .= " <button class='btn btn-xs btn-danger' id='btnDel' data-id='" . $row->id . "'><i class='fas fa-trash'></i></button>";
                }
                return $action;
            })
            ->rawColumns(['name_roll', 'rg_dob', 'parents', 'contact', 'img', 'addmit_date', 'action'])
            ->make('true');
    }


}
