<?php

namespace App\Http\Controllers\Staff\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TahunAjaranRequest;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Tahun Ajaran';

        return view('staff-pages.admin.tahun-ajaran.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Buat Tahun Ajaran';

        return view('staff-pages.admin.tahun-ajaran.buat-tahun-ajar', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TahunAjaranRequest $request)
    {
        // $validatedData = $request->validated();

        // AcademicYear::create($validatedData);
        // return redirect()->route('tahun-ajaran.index')->withSuccess('Berhasil menambahkan tahun ajaran baru.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
