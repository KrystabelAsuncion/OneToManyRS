<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\Student;
use App\Models\Auth\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::all();
        return response()->json(['subject' => $subject]);

    }

    public function store(Request $request)
    {
        return Subject::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);
        $subject->update($request->all());
        return response()->json(['subject' => $subject]);
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return response()->json(['message' => 'success']);
    }
}
