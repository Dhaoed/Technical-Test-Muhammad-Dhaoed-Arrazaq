<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }
    public function create()
    {
        return view('departments.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'dept_name' => 'required|string|max:50|unique:departments,dept_name'
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'New department has been successfully added.');
    }
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'dept_name' => 'required|string|max:50|unique:departments,dept_name,' . $department->id
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'The department has been successfully updated.');
    }
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'The department has been successfully deleted');
    }
}