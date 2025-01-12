<?php

namespace App\Http\Middleware;

use App\Models\SchoolYear;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SchoolYearStaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $schoolYear = SchoolYear::where('status', 'Aktif')->first();

        if (!$schoolYear) {
            if($user->hasRole('Admin')){
                $message = 'Tidak ada tahun ajaran yang aktif.';
                
                return response()->view('school-year.admin-info', compact('message')); 
            }else{
                $message = 'Tidak ada tahun ajaran yang aktif. Mohon hubungi admin sekolah Anda.';
                return response()->view('school-year.info', compact('message')); 
            }
        }

        return $next($request);
    }
}
