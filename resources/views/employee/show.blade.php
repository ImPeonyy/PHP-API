@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Employee Detail
                            <a href="{{ url('employee') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label style="color: red; font-size: 1.5em">Name: </label>
                            <p style="font-size: 1.5em">
                                {{ $employee->name }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <label style="color: red; font-size: 1.5em">Email: </label>
                            <p style="font-size: 1.5em">
                                {{ $employee->email }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <label style="color: red; font-size: 1.5em">Password: </label>
                            <br/>
                            <p style="font-size: 1.5em">
                                {{ $employee->password }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <label style="color: red; font-size: 1.5em">Address: </label>
                            <p style="font-size: 1.5em">
                                {{ $employee->address }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <label style="color: red; font-size: 1.5em">Created At: </label>
                            <p style="font-size: 1.5em">
                                {{ $employee->created_at }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <label style="color: red; font-size: 1.5em">Updated At: </label>
                            <p style="font-size: 1.5em">
                                {{ $employee->updated_at }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <label style="color: red; font-size: 1.5em">Role: </label>
                            <p style="font-size: 1.5em">
                                {{ $employee->role }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection