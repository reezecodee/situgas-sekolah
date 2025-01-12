<?php

namespace App\Http\Middleware;

use App\Models\SchoolYear;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SchoolYearStudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();

        if (
            !$schoolYear || 
            ($schoolYear->tgl_mulai && now()->lessThan($schoolYear->tgl_mulai)) || 
            ($schoolYear->tgl_selesai && now()->greaterThan($schoolYear->tgl_selesai))
        ) {
            $message = !$schoolYear
                ? 'Tidak ada tahun ajaran yang aktif. Mohon hubungi admin sekolah Anda.'
                : ($schoolYear->tgl_mulai && now()->lessThan($schoolYear->tgl_mulai)
                    ? 'Tahun ajaran belum dimulai.'
                    : 'Tahun ajaran telah berakhir. Silakan tunggu tahun ajaran berikutnya.');
        
            return response()->view('school-year.info', compact('message')); 
        }

        return $next($request);
    }
}
