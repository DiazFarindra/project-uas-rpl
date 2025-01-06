<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::query()
            ->where('user_id', Auth::id())
            ->get();

        return view('students.reports.index', [
            'reports' => $reports,
        ]);
    }

    public function create()
    {
        return view('students.reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Report::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('student.reports.index')->with('success', 'Report created successfully.');
    }

    public function edit(Report $report)
    {
        return view('students.reports.edit', [
            'report' => $report,
        ]);
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $report->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('student.reports.index')->with('success', 'Report updated successfully.');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('student.reports.index')->with('success', 'Report deleted successfully.');
    }
}
