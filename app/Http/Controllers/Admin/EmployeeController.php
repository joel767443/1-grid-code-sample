<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmploymentType;
use App\Models\Gender;
use App\Services\EmployeeService;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
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

    /** Display employee list
     *
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

    /** Display add employee form and accept and save details
     *
     * @param EmployeeRequest $request
     * @return Factory|View
     */
    public function addEmployee(EmployeeRequest $request)
    {
        if ($request->isMethod('post')) {

            $isEmployeeCreated = $this->employeeService->create($request);

            if (!$isEmployeeCreated) {
                return redirect()->back()->withInput()->with('error', 'Failed to create employee');
            }

            return redirect('employees')->with('message', 'Employee added.');
        }

        return view('admin.employees.add', $this->employeeViewAttributes());
    }

    /**
     * Display edit employee form and accept changes and save them into the database
     *
     * @param EmployeeRequest $request
     * @param Employee $employee
     * @return Factory|View
     */
    public function editEmployee(EmployeeRequest $request, Employee $employee)
    {
        if ($request->isMethod('post')) {
            try {
                $this->employeeService->update($employee, $request->all());
                return redirect('employees')->with('message', "Employee '$employee->first_name'' has been updated.");
            } catch (Exception $e) {
                return redirect()->back()->withInput()->with('error', "Failed to update employee " . $e->getMessage());
            }
        }

        return view('admin.employees.edit', $this->employeeViewAttributes($employee));
    }

    /** Delete an employee
     * @param Employee $employee
     * @return RedirectResponse
     * @throws Exception
     */
    public function deleteEmployee(Employee $employee)
    {
        try {
            $this->employeeService->delete($employee);
            return redirect('employees')->with('message', 'Employee deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Set employee attributes for edit and add form
     *
     * @param bool $employee
     * @return array
     */
    private function employeeViewAttributes($employee = false)
    {
        $designations = Cache::remember('designations', 600, function () { // cache for 10 minutes
            return Designation::all();
        });

        $genders = Cache::remember('genders', 600, function () { // cache for 10 minutes
            return Gender::all();
        });

        $employmentTypes = Cache::remember('employmentTypes', 600, function () { // cache for 10 minutes
            return EmploymentType::all();
        });

        return [
            'designations' => $designations,
            'genders' => $genders,
            'employee' => $employee ? $employee : new Employee(),
            'employmentTypes' => $employmentTypes
        ];
    }
}
