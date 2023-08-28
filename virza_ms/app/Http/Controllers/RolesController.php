<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Contracts\DataTable;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->getRoles();
        }
        return view('users.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('users.roles.create')->with(['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // return $request->name;
        
        //Validate name
        $this->validate($request, [
            'name' => 'required|unique:roles,name', 
            'permission' => 'required'
        ]);

        $role = Role::create(['name' => strtolower(trim($request->name))]);
        $role->syncPermissions($request->permission);

        if($role){
            toast('New role add successfully!','success');
            return view('users.roles.index');
        }
        toast('Error on Saving role!','error');

        return back()->withInput();
        
        // return $request->all();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Role $role)
    {
        if($request->ajax())
        {
            return $this->getRolesPermissions($role);
        }
        return view('users.roles.show')->with(['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Role $role)
    {
        return view('users.roles.edit')->with(['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Role $role, Request $request)
    {
        // validation  
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role->update($request->only('name'));
        $role->syncPermissions($request->permission);
        if ($role) {
            toast('Role Updating successfully!','success');
            return view('users.roles.index');
        }
        toast('Error on Updating role!','error');

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Role $role)
    {
        if($request->ajax() && $role->delete()){
            return response(["message" => "Role Deleted Successfully"], 200);
        }
        return response(["message" => "Role Delete Error! please try again"], 201);
    }

    /**
     * Show resource from storage.
     */
    private function getRoles()
    {
        $data = Role::withCount(['users', 'permissions'])->get();
        return DataTables::of($data)
            ->addColumn('name', function($row){ 
                return ucfirst($row->name);
            })
            ->addColumn('users_count', function($row){ 
                return $row->users_count;
            })
            ->addColumn('permissions_count', function($row){ 
                return $row->permissions_count;
            })
            ->addColumn('action', function($row){
                $action = "";
                if(Auth::user()->can('users.roles.show')){
                    $action.="<a class='btn btn-xs btn-success' id='btnShow' href='".route('users.roles.show', $row->id)."'><i class='fas fa-eye'></i></a> ";
                } 
                if(Auth::user()->can('users.roles.edit')){
                    $action .= '<a href="'.route("users.roles.edit", $row->id).'" class="btn btn-xs btn-warning" id="btnEdit"><i class="fas fa-edit"></i></a>';
                }
                if(Auth::user()->can('users.roles.destroy')){
                    $action .= '<button class="ml-2 btn btn-xs btn-outline-danger" id="btnDel" data-id="'.$row->id.'"><i class="fas fa-trash"></i></button>';
                }
                return $action;
            })
            ->make(true);
    }

    private function getRolesPermissions($role)
    {
        $permissions = $role->permissions; 
        return DataTables::of($permissions)->make('true');
    }

}
