<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;

//CRUD Department
Route::resource('departments', DepartmentController::class);
Route::get('/', [DepartmentController::class, 'index']);

// CRUD Employee 
Route::resource('employees', EmployeeController::class);

// CRUD Attendance 
Route::get('attendances', [AttendanceController::class, 'index'])->name('attendances.index');
Route::get('attendances/import', [AttendanceController::class, 'importForm'])->name('attendances.import');
Route::post('attendances/preview', [AttendanceController::class, 'preview'])->name('attendances.preview');
Route::post('attendances/store', [AttendanceController::class, 'storeImport'])->name('attendances.store');

Route::get('/', function () {
    return view('main');
});
