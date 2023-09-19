<?php

namespace App\Http\Controllers\Hrm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            return $this->getPermissions($request->role_id);
        }
        $aa = DB::select('select * from designation ');
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
        $depertment = Designation::create(["designation_name" => trim($request->designation_name)]);

        if ($depertment) {
            toast('New depertment added successfully!','success');
            // return $this->index();
            return view('hrm.employee.designation.index');
        }
        toast('Error on saving depertment!','error');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
