<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DataTables;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->getPermissions($request->role_id);
        }
        return view('users.permissions.index');
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
            'name' => 'required|unique:permissions'
        ]);
        $permission = Permission::create(["name" => strtolower(trim($request->name))]);
        // $permission = Permission::create(["name" => strtolower($request->name)]);

        if ($permission) {
            toast('New permission added successfully!','success');
            // return $this->index();
            return view('users.permissions.index');
        }
        toast('Error on saving permission!','error');

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
    public function edit(Request $request, Permission $permission)
    {
        return view('users.permissions.edit')->with(['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        // validation 
        $this->validate($request, [
            'name' => 'required | unique:permissions,name,'.$permission->id
        ]);
        $permissionUpdate = $permission->update($request->only('name'));

        if ($permissionUpdate) {
            toast('Permission Updated successfully!','success');
            // return $this->index();
            return view('users.permissions.index');
        }
        toast('Error on updated permission!','error');

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Permission $permission)
    {
        if($request->ajax() && $permission->delete()){
            return response(["message" => "Permission Deleted Successfully"], 200);
        }
        return response(["message" => "Permission Delete Error! please try again"], 201);
    }

    /**
     * Show resource from storage.
     */
    private function getPermissions($role_id)
    {
        $data = Permission::get();
        return DataTables::of($data, $role_id)
            ->addColumn('chkBox', function($row) use($role_id){
                if($row->name=="dashboard"){
                    return "<input type='checkbox' name='permission[".$row->name."]' value='". $row->name ." ' checked onclick='return false' >";
                } else {

                    if ($role_id !="") {
                        $role = Role::where('id', $role_id)->first();
                        $rolePermissions = $role->permissions->pluck('name')->toArray();
                        if (in_array($row->name, $rolePermissions)) {
                            return "<input type='checkbox' name='permission[".$row->name."]' value='". $row->name ." ' checked  >";
                        }

                    }
                    return "<input type='checkbox' name='permission[".$row->name."]' value='". $row->name ." ' class='permission' >";
                 
                }
            })
            ->addColumn('action', function($row){
                $action = "";
                $action.="<a class='btn btn-xs btn-warning' id='btnEdit' href='".route('users.permissions.edit', $row->id)."'><i class='fas fa-edit'></i></a>"; 
                $action.=" <button class='btn btn-xs btn-outline-danger' id='btnDel' data-id='".$row->id."'><i class='fas fa-trash'></i></button>";
                return $action;
            })
            ->rawColumns(['chkBox', 'action']) // for prevent show html in action columns
            ->make(true);
    }
}
