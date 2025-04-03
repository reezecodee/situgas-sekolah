<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubjectTeacher;

class SubjectTeacherController extends Controller
{
    public function deleteSubjectTeacher($id)
    {
        $subjectTeacher = SubjectTeacher::findOrFail($id);
        $subjectTeacher->delete();

        session()->flash('success', 'Berhasil menghapus data guru pengampu.');
        return redirect()->to(route('subject.teacher'));
    }
}
