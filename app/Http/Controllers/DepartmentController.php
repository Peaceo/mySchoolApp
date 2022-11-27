<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Response;
use Redirect;
use App\Models\{Faculty, Department};

class DepartmentController extends Controller
{
    //
     public function index()
    {
        $data['faculties'] = Faculty::get(["name", "id"]);
        return view('welcome', $data);
    }
    public function fetchState(Request $request)
    {
        $data['departments'] = Department::where("faculty_id",$request->faculty_id)->get(["name", "id"]);
        return response()->json($data);
    }
}

