<?php

namespace App\Exports;

use App\Models\Teacher;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TeacherScheduleExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $id;
    public $teacherId;

    public function __construct($id, $teacherId)
    {
        $this->id = $id;
        $this->teacherId = $teacherId;
    }

    public function collection()
    {
        $id = $this->teacherId;

        $teachingSchedules = TeachingSchedule::with(['subjectTeacher', 'classroom'])
        ->where('tahun_ajaran_id', $this->id)
        ->where('guru_id', $id)
        ->orderBy('hari') 
        ->get();

        $dayOrder = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $grouped = $teachingSchedules->groupBy('hari');
        $sortedGrouped = $grouped->sortBy(function ($value, $key) use ($dayOrder) {
            return array_search($key, $dayOrder); 
        });

        $exportData = collect();
        foreach ($sortedGrouped as $day => $schedules) {
            $sortedSchedules = $schedules->sortBy('jam_masuk');
            $exportData->push(['Hari' => $day]);

            foreach ($sortedSchedules as $schedule) {
                $exportData->push([
                    'Hari' => '',
                    'Jam' => "{$schedule->jam_masuk} - {$schedule->jam_keluar}",
                    'Mata Pelajaran' => $schedule->subjectTeacher->subject->nama,
                    'Kelas' => "{$schedule->classroom->tingkat} {$schedule->classroom->nama}",
                ]);
            }
        }

        return $exportData;
    }

    public function headings(): array
    {
        return ['Hari', 'Jam', 'Mata Pelajaran', 'Kelas'];
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        return [
            1 => [
                'font' => ['bold' => true],               
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',              
                ],
                'fill' => [
                    'fillType' => 'solid',               
                    'startColor' => ['rgb' => 'B0B0B0'], 
                ],
            ],
            'A1:' . $highestColumn . $highestRow => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'], 
                    ],
                ],
            ],
        ];
    }
}
