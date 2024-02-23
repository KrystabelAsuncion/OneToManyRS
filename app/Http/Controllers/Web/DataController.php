<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\Student;
use App\Models\Auth\Subject;

class DataController extends Controller
{
    public function index()
    {
        $students = Student::with('subjects')->get();
        $subjects = Subject::all();
        return view('data.index', compact('students', 'subjects'));
    }

    public function createStudent()
    {
        return view('students.create');
    }

    public function storeStudent(Request $request)
    {
        $student = Student::create($request->all());
        if ($request->has('subjects')) {
            $student->subjects()->createMany($request->input('subjects'));
        }
        return redirect()->route('dashboard')->with('success', 'Student created successfully');
    }

    public function editStudent($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function updateStudent(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Student updated successfully');
    }

    public function destroyStudent($id)
    {
        $student = Student::find($id);
        $student->subjects()->delete();
        $student->delete();
        return redirect()->route('dashboard')->with('success', 'Student deleted successfully');
    }

    public function createSubject()
    {
        $students = Student::all();
        return view('subjects.create', compact('students'));
    }

    public function storeSubject(Request $request)
    {
        Subject::create([
            'code' => $request->code,
            'title' => $request->title,
            'student_id' => $request->student_id,
        ]);
        return redirect()->route('dashboard')->with('success', 'Subject created successfully');
    }

    public function editSubject($id)
    {
        $subject = Subject::find($id);
        return view('subjects.edit', compact('subject'));
    }

    public function updateSubject(Request $request, $id)
    {
        $subject = Subject::find($id);
        $subject->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Subject updated successfully');
    }

    public function destroySubject($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('dashboard')->with('success', 'Subject deleted successfully');
    }
}
