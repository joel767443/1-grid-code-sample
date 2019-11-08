@extends('layouts.admin', [
    'pageTitle' => 'Employees',
    'pageDescription' => 'Employees / Add',
])

@section('content')
<div class="col-lg-8 col-md-offset-2">
    @include('admin.employees.form', ['formTitle' => 'Add Employee'])
</div>
@endsection
