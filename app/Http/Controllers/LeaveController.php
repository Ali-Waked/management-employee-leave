<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequest;
use App\Models\Leave;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('leave.index', [
            'leave' => Leave::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('leave.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaveRequest $request): RedirectResponse
    {
        Leave::create($request->validated());
        return to_route('leave.index')->with('success', 'create new leave success');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave): View
    {
        return view('leave.edit', [
            'leave' => $leave,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeaveRequest $request, Leave $leave): RedirectResponse
    {
        $leave->update($request->validated());
        return to_route('leave.index')->with('success', 'updated leave success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave): RedirectResponse
    {
        $leave->delete();
        return back()->with('success', 'deleted success');
    }
}
