@extends('layouts.admin', [
    'pageTitle' => 'Employees',
    'pageDescription' => 'Employees / List',
])

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">

                    <div class="col-sm-4 pull-right">
                        <form class="form-inline">
                            <div class="input-group"><input type="text" placeholder="Search"
                                                            class="input-sm form-control">
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary"> Go!</button>
                            </span>

                            </div>
                            <a href="{{ Route('add-employee') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> Add Employee
                            </a>
                        </form>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Emp. No</th>
                            <th>Department</th>
                            <th>Hire Date</th>
                            <th>Type</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->first_name . " " . $employee->last_name }}</td>
                                <td>{{ $employee->employee_number }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>{{ $employee->hire_date }}</td>
                                <td>{{ $employee->employmentType->label }}</td>
                                <td>
                                    <a href="{{ Route('edit-employee', $employee->id) }}"><i class="fa fa-edit text-success fa-lg"></i></a>
                                    <a href="{{ Route('delete-employee', $employee->id) }}"><i class="fa fa-minus text-danger fa-lg"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    </div>

@endsection
