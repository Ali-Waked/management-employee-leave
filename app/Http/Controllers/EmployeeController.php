<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Nette\Utils\Random;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // dd(Random::generate(8,'0-9'));
        return view('employee.index', [
            'employees' => Employee::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        // dd(Leave::all()->last()->created_at->year == now()->year,Employee::getUserName());
        // dd($request->validated());
        $password = Random::generate(8, '0-9');
        $username = Employee::getUserName();
        $employee = Employee::create(
            [
                ...$request->validated(),
                'username' => $username,
                'password' => $password
            ]

        );
        return to_route('employee.index')->with('success', "create New Employee Has USERNAME = {$username} and PASSWORD = {$password}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee): View
    {
        // dd($employee->getAttributes());
        return view('employee.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): View
    {
        return view('employee.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->validated());
        return to_route('employee.index')->with('success', 'updated employee successfly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        return to_route('employee.index')->with('success', 'deleted employee successfly');
    }
}
