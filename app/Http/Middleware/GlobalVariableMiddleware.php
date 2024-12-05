<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class GlobalVariableMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            $dataUser = Admin::with('user')->where('user_id', $user->id)->first();
        } elseif ($user->hasRole('Guru')) {
            $dataUser = Teacher::with('user')->where('user_id', $user->id)->first();
        } elseif ($user->hasRole('Siswa')) {
            $dataUser = Student::with('user')->where('user_id', $user->id)->first();
        } else {
            $dataUser = null;
        }

        View::share('userActive', $dataUser);

        return $next($request);
    }
}
