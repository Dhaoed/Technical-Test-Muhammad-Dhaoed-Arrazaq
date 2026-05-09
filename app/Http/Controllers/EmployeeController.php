<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')->get();
        return view('employees.index', compact('employees'));
    }
    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nik'          => 'required|unique:employees,nik|max:13',
            'full_name'    => 'required|max:50',
            'dept_id'      => 'required|exists:departments,id',
            'designation'  => 'required|max:50',
            'gender'       => 'required|in:Male,Female',
            'birth_place'  => 'required|max:50',
            'birth_date'   => 'required|date',
            'phone_no'     => 'required|max:13',
            'join_date'    => 'required|date',
            'join_end'     => 'nullable|date',
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Data has been successfully added.');
    }
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nik'          => 'required|max:13|unique:employees,nik,' . $employee->id,
            'full_name'    => 'required|max:50',
            'dept_id'      => 'required|exists:departments,id',
            'designation'  => 'required|max:50',
            'gender'       => 'required|in:Male,Female',
            'birth_place'  => 'required|max:50',
            'birth_date'   => 'required|date',
            'phone_no'     => 'required|max:13',
            'join_date'    => 'required|date',
            'join_end'     => 'nullable|date',
        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Data has been successfully updated.');
    }
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data has been successfully deleted.');
    }
}