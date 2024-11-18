<?php

namespace App\Http\Controllers\Datatables\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RecapitulationDatatableController extends Controller
{
    public function getStudents()
    {
        $students = collect([
            ['id' => 1, 'name' => 'Ahmad Fauzan', 'class' => '10A', 'score' => 85],
            ['id' => 2, 'name' => 'Siti Aminah', 'class' => '10B', 'score' => 90],
            ['id' => 3, 'name' => 'Budi Santoso', 'class' => '10A', 'score' => 75],
            ['id' => 4, 'name' => 'Nurul Huda', 'class' => '10C', 'score' => 88],
            ['id' => 5, 'name' => 'Rahmat Hidayat', 'class' => '10B', 'score' => 92],
            ['id' => 6, 'name' => 'Teguh Prasetyo', 'class' => '10A', 'score' => 70],
            ['id' => 7, 'name' => 'Lia Kusuma', 'class' => '10C', 'score' => 89],
            ['id' => 8, 'name' => 'Dewi Sartika', 'class' => '10B', 'score' => 95],
            ['id' => 9, 'name' => 'Hendra Putra', 'class' => '10A', 'score' => 60],
            ['id' => 10, 'name' => 'Rina Kartika', 'class' => '10C', 'score' => 78],
        ]);

        return DataTables::of($students)
            ->addColumn('action', function ($student) {
                return '<a href="/students/edit" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
