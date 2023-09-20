<?php

namespace App\Http\Controllers\Hrm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Designation;
use Yajra\DataTables\DataTables;

class DesignationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->getDepartment($request->role_id);
        }
        // $aa = DB::select('select * from designation ');
        // dd($aa);
        return view('hrm.employee.designation.index', compact('aa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // validation 
        $this->validate($request, [
            'designation_name' => 'required'
        ]);
        $depertmentCreate = Designation::create(["designation_name" => trim($request->designation_name)]);

        if ($depertmentCreate) {
            toast('New class added successfully!','success');
            // return $this->index();
            // return view('hrm.employee.designation.index');
            return redirect()->route('hrm.designation')->with('success', 'Depertment/Class Add successfully');
        }
        toast('Error on saving class!','error');

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
        $designation = Designation::findOrFail($id);
    
        return view('hrm.employee.designation.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $designation = Designation::findOrFail($id);

        $request->validate([
            'designation_name' => 'required|string|max:255'.$id,
            // Add validation rules for other fields as needed
        ]);

        $depertmentUpdate = $designation->update([
            'designation_name' => $request->input('designation_name'),
            // Update other fields as needed
        ]);

        if ($depertmentUpdate) {
            toast('Depertment Updated successfully!','success');
            // return $this->index();
            return redirect()->route('hrm.designation')->with('success', 'Depertment/Class updated successfully');
            // return view('hrm.employee.designation.index');
        }
        toast('Error on updated Depertment!','error');

        return back()->withInput();


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
    
        if($designation->delete()){
            // toast('Designation Deleted Successfully!','success');
            return response(["message" => "Designation Deleted Successfully"], 200);
        }
    
        return response(["message" => "Designation Delete Error! Please try again"], 201);
    }
    
    /**
     * Show resource from storage.
     */
    private function getDepartment($role_id)
    {
        $data = Designation::get();
        return DataTables::of($data, $role_id)
            ->addColumn('chkBox', function($row) use($role_id){
                if($row->name=="designation"){
                    return "<input type='checkbox' name='permission[".$row->name."]' value='". $row->name ." ' checked onclick='return false' >";
                } else {

                    if ($role_id !="") {
                        $role = Role::where('id', $role_id)->first();
                        $roleDepartment = $role->permissions->pluck('name')->toArray();
                        if (in_array($row->name, $roleDepartment)) {
                            return "<input type='checkbox' name='permission[".$row->name."]' value='". $row->name ." ' checked  >";
                        }

                    }
                    return "<input type='checkbox' name='permission[".$row->name."]' value='". $row->name ." ' class='permission' >";
                 
                }
            })
            ->addColumn('action', function($row){
                $action = "";
                if(Auth::user()->can('hrm.edit.designation')){
                    $action.="<a class='btn btn-xs btn-warning' id='btnEdit' href='".route('hrm.edit.designation', $row->id)."'><i class='fas fa-edit'></i></a>"; 
                }
                if(Auth::user()->can('hrm.destroy.designation')){
                    $action.=" <button class='btn btn-xs btn-outline-danger' id='btnDel' data-id='".$row->id."'><i class='fas fa-trash'></i></button>";
                }
                return $action;
            })
            ->rawColumns(['chkBox', 'action']) // for prevent show html in action columns
            ->make(true);
    }
}
