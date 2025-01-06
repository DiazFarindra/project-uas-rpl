<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $schedules = Schedule::query()
            ->where('student_id', Auth::id())
            ->oldest('date_time')
            ->get();

        $schedulesStats = Schedule::query()
            ->where('student_id', Auth::id())
            ->selectRaw('
                SUM(CASE WHEN status = "pending" THEN 1 ELSE 0 END) as pending,
                SUM(CASE WHEN status = "approved" THEN 1 ELSE 0 END) as overdue,
                SUM(CASE WHEN status = "rejected" THEN 1 ELSE 0 END) as completed
            ')
            ->first();

        $schedulesPending = Schedule::query()
            ->where('student_id', Auth::id())
            ->where('status', 'pending')
            ->whereBetween('date_time', [now(), now()->addDays(7)])
            ->count();

        return view('students.dashboard', [
            'schedules' => $schedules,
            'schedulesStats' => $schedulesStats,
            'schedulesPending' => $schedulesPending,
        ]);
    }
}
