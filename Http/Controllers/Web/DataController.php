<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\Student;
use App\Models\Auth\Subject;
use Illuminate\Support\Facades\Validator;


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

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
        ]);

        $student = Student::create($validatedData);

        if ($request->has('subjects')) {

            $subjectValidationRules = [
                'code' => 'required|string|max:255',
                'title' => 'required|string|max:255',
            ];

            foreach ($request->input('subjects') as $subjectData) {
                $validator = Validator::make($subjectData, $subjectValidationRules);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $student->subjects()->create([
                    'code' => $subjectData['code'],
                    'title' => $subjectData['title'],
                ]);
            }
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

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
        ]);


        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('dashboard')->with('error', 'Student not found');
        }


        $student->update([
            'name' => $validatedData['name'],
            'course' => $validatedData['course'],
        ]);


        if ($request->has('subjects')) {
            $subjectValidationRules = [
                'code' => 'required|string|max:255',
                'title' => 'required|string|max:255',
            ];

            foreach ($request->input('subjects') as $subjectData) {
                $validator = Validator::make($subjectData, $subjectValidationRules);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }


                $subject = $student->subjects()->find($subjectData['code']);


                if ($subject) {
                    $subject->update([
                        'code' => $subjectData['code'],
                        'title' => $subjectData['title'],
                    ]);
                } else {
                    $student->subjects()->create([
                        'code' => $subjectData['code'],
                        'title' => $subjectData['title'],
                    ]);
                }
            }
        }

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
        $students = Student::all();
        return view('subjects.edit', compact('subject','students'));
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
