<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        if ($employees->count() > 0) {
            return view('employee.index', [
                'employees' => EmployeeResource::collection($employees), // Thêm dữ liệu nhân viên vào view
            ]);
        } else {
            return response()->json(['message' => 'No record'], 200);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('api.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'role' => 'required|integer|max:11',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All Fields are Mandatory',
                'error' => $validator->messages(),
                ],422);
        }

        $employee = Employee::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
            'address'=> $request->address,
            'role'=> $request->role,
        ]);

        response()->json([
            'message' => 'Employee Created Successfully !',
            'data' => new EmployeeResource($employee),
            ],200);

            return redirect('employee');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employee.show', [
            'employee' => new EmployeeResource($employee), // Thêm dữ liệu nhân viên vào view
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', [
            'employee' => new EmployeeResource($employee), // Thêm dữ liệu nhân viên vào view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'role' => 'required|integer|max:11',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All Fields are Mandatory',
                'error' => $validator->messages(),
                ],422);
        }

        $employee->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
            'address'=> $request->address,
            'role'=> $request->role,
        ]);


        response()->json([
            'message' => 'Employee Updated Successfully !',
            'data' => new EmployeeResource($employee),
            ],200);

            return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        response()->json([
            'message' => 'Employee Deleted Successfully !'
        ], 200);
        return redirect('employee');
    }
}
