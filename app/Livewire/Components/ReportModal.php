<?php

namespace App\Livewire\Components;

use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Browsershot\Browsershot;

class ReportModal extends Component
{
    public $studentId;
    public $student;
    public $imageUrl;
    public $screenshotPath;

    #[On('show-modal')]
    public function showModal($id)
    {
        $this->studentId = $id;
        $this->student = Student::find($id);

        $url = 'https://getbootstrap.com/docs/5.3/components/modal/#how-it-works';
        $this->screenshotPath = public_path('raport/screenshot.png');

        Browsershot::url($url)
            ->noSandbox()
            ->windowSize(800, 600)
            ->paperSize(210, 297)
            ->save($this->screenshotPath);

        $this->imageUrl = asset('raport/screenshot.png');
    }

    public function closeModal()
    {
        $this->student = null;

        if (File::exists($this->screenshotPath)) {
            File::delete($this->screenshotPath);
        }
    }

    public function downloadCover($id)
    {
        $student = Student::findOrFail($id);
        $pdf = PDF::loadView('raport.cover', ['student' => $student])
            ->setPaper('a4', 'portrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "cover_{$student->nis}_{$student->nama}.pdf");
    }

    public function downloadDataStudent($id)
    {
        $student = Student::findOrFail($id);

        $pdf = PDF::loadView('raport.data-siswa', [
            'student' => $student,
            'qrCode' => null
            ])
            ->setPaper('a4', 'portrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "data-siswa_{$student->nis}_{$student->nama}.pdf");
    }

    public function downloadAttitude($id)
    {
        $student = Student::findOrFail($id);
        $pdf = PDF::loadView('raport.nilai-sikap', ['student' => $student])
            ->setPaper('a4', 'portrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "nilai-sikap_{$student->nis}_{$student->nama}.pdf");
    }

    public function downloadAcademic($id)
    {
        $student = Student::findOrFail($id);
        $pdf = PDF::loadView('raport.nilai-akademik', ['student' => $student])
            ->setPaper('a4', 'portrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "nilai-akademik_{$student->nis}_{$student->nama}.pdf");
    }

    public function render()
    {
        return view('livewire.components.report-modal');
    }
}
