<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User; 
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\DataTables\DataTables;
use Image;

class ExamController extends Controller
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
            return $this->getExams(); // $request->role_id
        }

        return view('exam.index')->with([
            "institution" => Institution::get()
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
            // 'note' => 'required',
            'status' => 'required',
        ]);
        $currentUserId = Auth::user()->id;
        $institute_id = auth()->user()->iid;

        if($validated){
            $addExams = Exam::create([
                'name' => trim($request->name),
                'note' => trim($request->note),
                'serial_no' => 1,
                'created_at_user_id' => $currentUserId,
                'updateted_at_id' => $currentUserId,
                'institute_id' => $institute_id,
                'status' => trim($request->status)
            ]);
        }
        
        if ($addExams) {
            toast('New Exam added successfully!','success');
            // return $this->index();
            return redirect()->route('exams.exam')->with('success', 'Exam Add successfully');
        }
        toast('Error on saving exam!','error');

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        $iid = User::find($exam->institute_id);

        return view('exam.show', compact('exam', 'iid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
    
        return view('exam.edit', compact('exam'))->with([
            "institution" => Institution::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'note' => 'required',
            'serial_no' => 'required',
            'status' => 'required',
        ]);

        $currentUserId = Auth::user()->id;
        $institute_id = auth()->user()->iid;
        $examUpdate = $exam->update([
            'name' => $request->input('name'),
            'note' => $request->input('note'),
            'serial_no' => $request->input('serial_no'),
            'updateted_at_id' => $currentUserId,
            'institute_id' => $institute_id,
            'status' => $request->input('status'),
        ]);

        if ($examUpdate) {
            toast('Exam Updated successfully!','success');
            // return $this->index();
            return redirect()->route('exams.exam')->with('success', 'Exam updated successfully');
            // return view('ins.exam.exam.index');
        }
        toast('Error on updated exam!','error');

        return back()->withInput();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);

        if($exam->delete()){
            toast('Exam Deleted Successfully!','success');
            return response(["message" => "Exam Deleted Successfully"], 200);
        }
    
        return response(["message" => "Exam Delete Error! Please try again"], 201);
    }
    
    
    private function getExams()
    {
        
        // $currentUserId = Auth::user()->id;
        // $institute_id = auth()->user()->iid;
        // $exam = Exam::findOrFail($institute_id);

        // $iid = User::find($exam->institute_id);

        $data = Exam::with(['institution'])->get();

        return DataTables::of($data)
            ->addColumn('exams', function($row) {
                $dep = '';
                $dep .= '<b>'.$row->name.'</b>';
                $dep .= '<p>'.$row->institution->name.'</p>';
                return $dep;
            })
            ->addColumn('logo', function($row) {
                $image = "";
                if($row->institution->logo){
                    $image .= '<img class="exam-img" style="width:70px;" src="'.Storage::url($row->institution->logo).'" alt="'.$row->institution->name.'" srcset="">';
                } else {
                    $image .= '<svg xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z"/></svg>';
                }
                return $image;
            })
            ->addColumn('note', function($row) {
                $dates = Carbon::parse($row->created_at)->format('d M, Y h:i:s A');
                $note = '';
                $note .= '<b>'.$row->status.'</b>';
                $note .= '<p>'.$dates.' & '.$row->note.'</p>';
                return $note;
            })
            ->addColumn('action', function($row) {
                $action = "";
                if (Auth::user()->can('exams.edit.exam')) {
                    $action .= "<a class='btn btn-xs btn-warning' id='btnEdit' href='" . route('exams.edit.exam', $row->id) . "'><i class='fas fa-edit'></i></a>";
                }
                if (Auth::user()->can('exams.destroy.exam')) {
                    $action .= " <button class='btn btn-xs btn-danger' id='btnDel' data-id='" . $row->id . "'><i class='fas fa-trash'></i></button>";
                }
                return $action;
            })
            ->rawColumns(['exams', 'note','logo', 'action'])
            ->make('true');
    }


}
