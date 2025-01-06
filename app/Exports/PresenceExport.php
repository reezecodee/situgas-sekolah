<?php

namespace App\Exports;

use App\Models\PresenceTeacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PresenceExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $students;
    public $id;
    public $teacherData;
    public $teacherName;
    public $subjectName;
    public $className;
    public $schoolYear;

    public function __construct($students, $id)
    {
        $this->students = $students;
        $this->teacherData = PresenceTeacher::with(['classroom', 'teacher', 'schoolYear', 'teachingSchedule'])->findOrFail($id);
        $this->subjectName = $this->teacherData->teachingSchedule->subjectTeacher->subject->nama;
        $this->teacherName = $this->teacherData->teacher->nama;
        $this->className = $this->teacherData->classroom;
        $this->schoolYear = $this->teacherData->schoolYear;
    }   

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Status Kehadiran',
            'Tanggal'
        ];
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

        $sheet->setCellValue("A" . ($highestRow + 2), 'Tahun Ajaran: ' . $this->schoolYear->periode . ' - ' . $this->schoolYear->semester); 
        $sheet->setCellValue("A" . ($highestRow + 3), 'Nama Guru: ' . $this->teacherName); 
        $sheet->setCellValue("A" . ($highestRow + 4), 'Nama Pelajaran: ' . $this->subjectName); 
        $sheet->setCellValue("A" . ($highestRow + 5), 'Nama Kelas: ' . $this->className->tingkat . ' ' . $this->className->nama); 
        $sheet->getStyle('A' . ($highestRow + 2) . ':A' . ($highestRow + 5))->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => 'left',
            ],
        ]);

        return [];
    }


    public function collection()
    {
        return collect($this->students);
    }
}
