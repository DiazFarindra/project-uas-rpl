<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AccountRequest;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = User::query()
            ->whereNot('type', UserType::ADMIN)
            ->get();

        return view('admin.accounts.index', [
            'accounts' => $accounts,
        ]);
    }

    public function create()
    {
        return view('admin.accounts.create');
    }

    public function store(AccountRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('admin.accounts.index')->with('success', 'Account created successfully');
    }

    public function edit(User $user)
    {
        return view('admin.accounts.edit', [
            'account' => $user,
        ]);
    }

    public function update(AccountRequest $request, User $user)
    {
        $data = $request->validated();

        if ($data['password'] === null) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.accounts.index')->with('success', 'Account updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.accounts.index')->with('success', 'Account deleted successfully');
    }
}
