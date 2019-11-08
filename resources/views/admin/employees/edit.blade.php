@extends('layouts.admin', [
    'pageTitle' => 'Employees',
    'pageDescription' => 'Employees / Edit',
])

@section('content')
    <div class="col-lg-10 col-md-offset-1">
        @include('admin.employees.form', [
            'formTitle' => 'Edit Employee',
            'employee' => $employee
        ])
    </div>
@endsection
