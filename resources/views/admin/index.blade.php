@extends('layouts.admin', [
    'pageTitle' => 'Dashboard',
    'pageDescription' => 'Dashboard / Statistics',
])

@section('content')
    <div class="wrapper wrapper-content">
        <div class="middle-box text-center animated fadeInRightBig">
            <h3 class="font-bold">Dashboard</h3>
            <div class="error-desc">
                Click on employees to add, edit, search and delete employees
                <br/><a href="{{ Route('employees') }}" class="btn btn-primary m-t">Employees</a>
            </div>
        </div>
    </div>
@endsection
