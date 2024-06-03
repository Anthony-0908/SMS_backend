<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentServices;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentServices $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->studentService->getStudent();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Age' => 'required|integer',
            'Gender' => 'required|string',
            'Address' => 'required|string',
            'Course' => 'required|string',
            'Year' => 'required|string',
            'BirthDay' => 'required|date',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:table_students',
            'Photo' => 'nullable|string'
        ]);

        $student = $this->studentService->createStudent($data);

        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = $this->studentService->getStudentById($id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'FirstName' => 'sometimes|required|string|max:255',
            'LastName' => 'sometimes|required|string|max:255',
            'Age' => 'sometimes|required|integer',
            'Gender' => 'sometimes|required|string',
            'Address' => 'sometimes|required|string',
            'Course' => 'sometimes|required|string',
            'Year' => 'sometimes|required|string',
            'BirthDay' => 'sometimes|required|date',
            'password' => 'sometimes|required|string|min:8',
            'email' => 'sometimes|required|string|email|max:255|unique:table_students,email,'.$id,
            'Photo' => 'nullable|string'
        ]);

        $student = $this->studentService->updateStudent($id, $data);

        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->studentService->deleteStudent($id);

        return response()->json(['message' => 'Student deleted successfully']);
    }
}
