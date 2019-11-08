@extends('layouts.admin', [
    'pageTitle' => 'Employees',
    'pageDescription' => 'Employees / Add',
])

@section('content')
<div class="col-lg-10 col-md-offset-1">
    @include('admin.employees.form', ['formTitle' => 'Add Employee'])
</div>
@endsection
