<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Enums\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;

class DashboardController extends Controller
{
    public function index()
    {
        $students = User::where('type', UserType::STUDENT)->count();
        $teachers = User::where('type', UserType::TEACHER)->count();
        $schedules = Schedule::count();

        return view('admin.dashboard', [
            'students' => $students,
            'teachers' => $teachers,
            'schedules' => $schedules,
        ]);
    }
}
