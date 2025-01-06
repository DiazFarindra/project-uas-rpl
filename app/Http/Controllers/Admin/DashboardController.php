<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Enums\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $students = User::where('type', UserType::STUDENT)->count();
        $teachers = User::where('type', UserType::TEACHER)->count();

        return view('admin.dashboard', [
            'students' => $students,
            'teachers' => $teachers,
        ]);
    }
}
