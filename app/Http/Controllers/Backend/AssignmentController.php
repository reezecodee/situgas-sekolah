<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function delete($id)
    {
        $assignment = Assignment::findOrFail($id);

        $submissions = Submission::where('penugasan_id', $assignment->id)->get();

        if($submissions){
            foreach ($submissions as $submission) {
                if ($submission->file_pengerjaan && Storage::disk('public')->exists($submission->file_pengerjaan)) {
                    Storage::disk('public')->delete($submission->file_pengerjaan);
                }
            }
        }

        Submission::where('penugasan_id', $assignment->id)->delete();

        if ($assignment->file_soal && Storage::disk('public')->exists($assignment->file_soal)) {
            Storage::disk('public')->delete($assignment->file_soal);
        }

        $assignment->delete();

        return back()->with('success', 'Penugasan dan semua data terkait berhasil dihapus.');
    }

    public function deleteSchedule($id)
    {
        $teachingSchedule = TeachingSchedule::findOrFail($id);
        $teachingSchedule->delete();

        return back()->with('success', 'Jadwal guru berhasil dihapus.');
    }
}
