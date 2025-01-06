<?php

namespace App\Exports;

use App\Models\Assignment;
use App\Models\Student;
use App\Models\TeachingSchedule;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SubmissionExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $teachingSchedule = TeachingSchedule::findOrFail($this->id);
        $students = Student::where('kelas_id', $teachingSchedule->kelas_id)->orderBy('nama', 'asc')->get();
        $assignments = Assignment::with('submission')->where('jadwal_mengajar_id', $this->id)->get();

        return $students->map(function ($student) use ($assignments) {
            $row = [
                'nama_siswa' => $student->nama,
            ];

            $totalNilai = 0;

            foreach ($assignments as $index => $assignment) {
                $submission = $assignment->submission->where('siswa_id', $student->id)->first();
                $nilai = $submission ? $submission->nilai : '0';

                $row[$assignment->judul_tugas] = $nilai;

                $totalNilai += $nilai;
            }

            $row['total_nilai'] = "$totalNilai";
            $row['rata_rata'] = count($assignments) > 0 ? "".round($totalNilai / count($assignments), 2)."" : '0';

            return $row;
        });
    }

    public function headings(): array
    {
        $assignments = Assignment::where('jadwal_mengajar_id', $this->id)->get();
        $headers = ['Nama Siswa'];

        foreach ($assignments as $index => $assignment) {
            $headers[] = $assignment->judul_tugas;
        }

        $headers[] = 'Total Nilai';
        $headers[] = 'Rata-Rata';

        return $headers;
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow(); 
        $highestColumn = $sheet->getHighestColumn();
        $range = "A1:{$highestColumn}{$highestRow}";

        $sheet->getStyle($range)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle('A1:' . $highestColumn . '1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFD3D3D3'],
            ],
        ]);

        return [];
    }
}
