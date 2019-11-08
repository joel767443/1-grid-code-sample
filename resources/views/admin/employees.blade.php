@extends('layouts.admin', [
    'pageTitle' => 'Employees',
    'pageDescription' => 'Employees / List',
])

@section('content')
    <div class="wrapper wrapper-content">
        <div class="middle-box text-center animated fadeInRightBig">
            <h3 class="font-bold">This is page content</h3>
            <div class="error-desc">
                Click on employees to add, edit, search and delete employees
                <br/><a href="{{ Route('dashboard') }}" class="btn btn-primary m-t">Dashboard</a>
            </div>
        </div>
    </div>
@endsection
