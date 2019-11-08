@extends('layouts.admin', [
    'pageTitle' => 'Employees',
    'pageDescription' => 'Employees / Edit',
])

@section('content')
    <div class="col-lg-8 col-md-offset-2">
        @include('admin.employees.form', [
            'formTitle' => 'Edit Employee',
            'employee' => $employee
        ])
    </div>
@endsection
