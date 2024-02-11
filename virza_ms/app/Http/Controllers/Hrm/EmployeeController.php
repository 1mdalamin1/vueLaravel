<?php

namespace App\Http\Controllers\Hrm;

use Carbon\Carbon;
use App\Models\User; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\HelperFunctions; // This is store-reusable function
use App\Models\Designation;
use App\Models\Employee;
use Yajra\DataTables\DataTables;
use Image;


class EmployeeController extends Controller
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
            return $this->getEmployees(); // $request->role_id
        }
            
        // Retrieve users whose user_id does not exist in the employees table
        $users = User::whereNotIn('id',function($query){$query->select('user_id')->from('employees');})->get();
        
        # 2nd way
        // Get all department IDs from the employees
        $depertmentIds = Employee::pluck('department_id')
        ->flatMap(function ($ids) {
            return explode(',', $ids);
        })
        ->unique()
        ->sort();

        // Get departments not in $depertmentIds
        $departments = Designation::whereNotIn('id', $depertmentIds)->get();  // Designation::get()
        return view('hrm.employees.index')->with([
            "users" => $users, // User::get(),
            "depertments" => $departments
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {     
        // if($request->ajax())
        // {
        //     return $this->getEmployees(); // $request->role_id
        // }

        // Retrieve users whose user_id does not exist in the employees table
        $users = User::whereNotIn('id', function ($query) {
            $query->select('user_id')->from('employees');
        })->get();

    /*  # 3rd way
        // Retrieve designations whose department_id does not exist in the employees table
        $departments = DB::table('designations')
            ->leftJoin('employees', function ($join) {
                $join->on('designations.id', '=', DB::raw("TRIM(BOTH ',' FROM employees.department_id)"));
            })
            ->whereNull('employees.id')
            ->select('designations.*')
            ->get();
    */
    /*
        # 2nd way
        // Get all department IDs from the employees
        $depertmentIds = Employee::pluck('department_id')
        ->flatMap(function ($ids) {
            return explode(',', $ids);
        })
        ->unique()
        ->sort();

        // Get departments not in $depertmentIds
        $departments = Designation::whereNotIn('id', $depertmentIds)->get();
    */ 
      
        # 1st way      
        $employeeCids = Employee::get();
        $depertmentIds = [];
        foreach ($employeeCids as $key => $value) {
            $cIds = explode(',', $value->department_id);
            $depertmentIds = array_merge($depertmentIds, $cIds);
        }
        $depertmentIds = array_unique($depertmentIds);
        sort($depertmentIds);
        $departments = Designation::whereNotIn('id', $depertmentIds)->get();
    
        
        // Designation::get()
        return view('hrm.employees.add')->with([
            "users" => $users,
            "depertments" => $departments 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // validation 
        $validated=$this->validate($request, [
            'employee_id' => 'required',
            'user_id' => 'required',
            'department_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'blood' => 'required',
            'nid' => 'required',
            'dob' => 'required',
            'joining_date' => 'required',
            'salary' => 'required',
            'status' => 'required',
        ]);

        // Check if user_id already exists
        $existingEmployee = Employee::where('user_id', $request->user_id)->first();
        if ($existingEmployee) {
            toast('User already exists.', 'error');
            // return redirect()->route('hrm.employee')->with('error', 'User Already Exists');
            return back()->withInput();
        }

        $currentUserId = Auth::user()->id;
        $iid = auth()->user()->iid;
        $filePath="images/a.png";
        if ($request->hasFile('image')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('images/employee', request()->file('image'));
            // $validated['image'] = $filePath;
        }
        
        $intArray = array_map('intval', $request->department_id);
        $depertmentIds = implode(',', $intArray);

        if($validated){
            $addEmployees = Employee::create([
                'employee_id' => strtolower(trim($request->employee_id)),
                'user_id' => trim($request->user_id),
                'department_id' => trim($depertmentIds),
                'phone' => trim($request->phone),
                'address' => trim($request->address),
                'gender' => trim($request->gender),
                'blood' => trim($request->blood),
                'nid' => trim($request->nid),
                'image' => $filePath,
                'dob' => trim($request->dob),
                'joining_date' => trim($request->joining_date),
                'salary' => trim($request->salary),
                'created_at_id' => $currentUserId,
                'updateted_at_id' => $currentUserId,
                'institute_id' => $iid,
                'status' => trim($request->status)
            ]);
        }
        
        if ($addEmployees) {
            toast('New Employee added successfully!','success');
            // return $this->index();
            return redirect()->route('hrm.employee')->with('success', 'Employee Add successfully');
        }
        toast('Error on saving employee!','error');

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $eId = $employee->user_id;
        return view('hrm.employees.edit', compact('employee'))->with([
            "users" => User::where('id', $eId)->get(),
            "depertments" => Designation::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $idUser = $employee->user_id;
        $request->validate([
            'address' => 'required|string|max:255'.$id,
            'employee_id' => 'required',
            'user_id' => 'required',
            'department_id' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'blood' => 'required',
            'nid' => 'required',
            'dob' => 'required',
            'joining_date' => 'required',
            'salary' => 'required',
            'status' => 'required',
        ]);

        
        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($employee->image);

            $filePath = Storage::disk('public')->put('images/employee', request()->file('image'), 'public');
            // $validated['image'] = $filePath;
        } else {
            $filePath = $employee->image;
        }

        $intArray = array_map('intval', $request->input('department_id'));
        $depertmentIds = implode(',', $intArray);
        $depertmentUpdate = $employee->update([
            'address' => $request->input('address'),
            'employee_id' => $request->input('employee_id'),
            'user_id' => $idUser,
            'department_id' => $depertmentIds,
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'blood' => $request->input('blood'),
            'nid' => $request->input('nid'),
            'dob' => $request->input('dob'),
            'joining_date' => $request->input('joining_date'),
            'salary' => $request->input('salary'),
            'status' => $request->input('status'),
            'image' => $filePath,
        ]);

        if ($depertmentUpdate) {
            toast('employee Updated successfully!','success');
            // return $this->index();
            return redirect()->route('hrm.employee')->with('success', 'employee updated successfully');
            // return view('hrm.employee.employee.index');
        }
        toast('Error on updated Depertment!','error');

        return back()->withInput();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
    
        Storage::disk('public')->delete($employee->image);

        if($employee->delete()){
            toast('employee Deleted Successfully!','success');
            return response(["message" => "Employee Deleted Successfully"], 200);
        }
    
        return response(["message" => "Employee Delete Error! Please try again"], 201);
    }
    
    
    private function getEmployees()
    {
        $data = Employee::with(['user', 'user.roles', 'department'])->get();
        // $idClassName = Designation::get()->pluck('designation_name', 'id')->toArray();
        // var_dump($data->department_id);
        return DataTables::of($data)
            ->addColumn('user_name', function($row) {
                $info = "";
                $info .= '<b>'.ucfirst($row->user->name).'</b>';
                $info .= '<p><a href="mailto:'.$row->user->email.'"><i class="fas fa-envelope" data-toggle="tooltip" data-placement="top" title="'.$row->user->email.'"></i></a> | ';
                $info .= '<a href="tel:'.$row->phone.'"> '.$row->phone.'</a></p>';
                // $info .= '<a href="tel:'.$row->phone.'" data-toggle="tooltip" data-placement="top" title="'.$row->phone.'"><i class="fas fa-phone"></i> '.$row->phone.'</a></p>';
                
                return $info;
            })
            ->addColumn('department', function($row) {
                $cIds = $row->department_id;
                $idClassName = Designation::get()->pluck('designation_name', 'id')->toArray();
                // $cNames= $this->get_name_by_ids_comma_saparate_string($idClassName, $cIds);
                $cNames= get_name_by_ids_comma_separate_string($idClassName, $cIds);
                $dep = '';
                // $dep .= '<b>'.$cNames.'</b>'; badge-success | badge word-wrap
                $dep .= '<span class="badge bg-dark" style="text-wrap: balance;">' .$cNames. '</span> ';
                return $dep;
            })
            ->addColumn('email', function($row) {
                return $row->user->email;
            })
            ->addColumn('roles', function($row) {
                $joinDate = Carbon::parse($row->joining_date)->format('d M Y');
                $role = "";
                if ($row->user->roles != null) {
                    foreach ($row->user->roles as $next) {
                        $role .= '<span class="badge badge-primary">' . ucfirst($next->name) . '</span> ';
                    }
                }
                $role .= '<p class=""><b>'.$joinDate.'</b></p> ';
                return $role;
            })
            
            ->addColumn('img', function($row) {
                $image = "";
                if($row->image){
                    $image .= '<img class="employee-img" style="width:70px;" src="'.Storage::url($row->image).'" alt="'.$row->user->name.'" srcset="">';
                } else {
                    $image .= '<svg xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z"/></svg>';
                }
                return $image;
            })
            ->addColumn('date', function($row) {
                return Carbon::parse($row->created_at)->format('d M, Y h:i:s A');
            })
            ->addColumn('action', function($row) {
                $action = "";
                if (Auth::user()->can('hrm.edit.employee')) {
                    $action .= "<a class='btn btn-xs btn-warning' id='btnEdit' href='" . route('hrm.edit.employee', $row->id) . "'><i class='fas fa-edit'></i></a>";
                }
                if (Auth::user()->can('hrm.destroy.employee')) {
                    $action .= " <button class='btn btn-xs btn-outline-danger' id='btnDel' data-id='" . $row->id . "'><i class='fas fa-trash'></i></button>";
                }
                return $action;
            })
            ->rawColumns(['user_name', 'email', 'roles', 'name', 'img', 'date', 'department', 'action'])
            ->make('true');
    }


}
