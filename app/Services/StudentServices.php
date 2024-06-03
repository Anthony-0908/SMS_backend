<?php
namespace App\Services;

use App\Models\Student;

class StudentServices {
    public function getStudent()
    {
        return Student::all();
    }

    public function getStudentById($id)
    {
        return Student::findOrFail($id);
    }

    public function createStudent($data)
    {
        return Student::create($data);

    }


    public function updateStudent($id, $data)
    {
        $student = Student::findOrFail($id);
        $student->update($data);

        return $student;
    }


    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    }
}
?>
