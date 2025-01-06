<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InformationRequest;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::query()->latest()->get();

        return view('admin.informations.index', [
            'informations' => $informations,
        ]);
    }

    public function create()
    {
        $users = User::query()
            ->whereNot('type', UserType::ADMIN)
            ->get();

        return view('admin.informations.create', [
            'users' => $users,
        ]);
    }

    public function store(InformationRequest $request)
    {
        Information::create($request->validated());

        return redirect()->route('admin.informations.index')->with('success', 'Information created successfully');
    }

    public function edit(Information $information)
    {
        $users = User::query()
            ->whereNot('type', UserType::ADMIN)
            ->get();

        return view('admin.informations.edit', [
            'information' => $information,
            'users' => $users,
        ]);
    }

    public function update(InformationRequest $request, Information $information)
    {
        $information->update($request->validated());

        return redirect()->route('admin.informations.index')->with('success', 'Information updated successfully');
    }

    public function destroy(Information $information)
    {
        $information->delete();

        return redirect()->route('admin.informations.index')->with('success', 'Information deleted successfully');
    }
}
