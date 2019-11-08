<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class EmployeeController
 * @package App\Http\Controllers\Admin
 */
class EmployeeController extends Controller
{
    /**
     * @var EmployeeService
     */
    private $employeeService;

    /**
     * EmployeeController constructor.
     */
    public function __construct()
    {
        $this->employeeService = new EmployeeService();
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $employees = $this->employeeService->findAll();

        return view('admin.employees.index', [
            'totalEmployees' => $this->employeeService->totalEmployees(),
            'employees' => $employees
        ]);
    }

    /**
     * @return Factory|View
     */
    public function addEmployee()
    {
        return view('admin.employees.add');
    }

    /**
     * @param Employee $employee
     * @return Factory|View
     */
    public function editEmployee(Employee $employee)
    {
        return view('admin.employees.edit', ['employee' => $employee]);
    }

    /**
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function deleteEmployee(Employee $employee)
    {
        $deleted = $this->employeeService->delete($employee);
        if ($deleted) {
            return redirect('employees')->with('message', 'Employee deleted');
        }

        return redirect()->back()->with('error', $deleted->getMessage());
    }
}
