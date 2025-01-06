<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::query()
            ->with(['teacher', 'student'])
            ->latest()
            ->get();

        return view('admin.schedules.index', [
            'schedules' => $schedules,
        ]);
    }

    public function create()
    {
        $teachers = User::query()
            ->where('type', UserType::TEACHER)
            ->get();

        $students = User::query()
            ->where('type', UserType::STUDENT)
            ->get();

        return view('admin.schedules.create', [
            'teachers' => $teachers,
            'students' => $students,
        ]);
    }

    public function store(ScheduleRequest $request)
    {
        Schedule::create($request->validated());

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule created successfully');
    }

    public function edit(Schedule $schedule)
    {
        $teachers = User::query()
            ->where('type', UserType::TEACHER)
            ->get();

        $students = User::query()
            ->where('type', UserType::STUDENT)
            ->get();

        return view('admin.schedules.edit', [
            'schedule' => $schedule,
            'teachers' => $teachers,
            'students' => $students,
        ]);
    }

    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->validated());

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule updated successfully');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule deleted successfully');
    }
}
