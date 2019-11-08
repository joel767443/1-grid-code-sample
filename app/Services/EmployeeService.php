<?php


namespace App\Services;


use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class EmployeeService
 * @package App\Services
 * @method getMessage()
 */
class EmployeeService
{
    /**
     * @var Employee
     */
    private $model;

    /**
     * EmployeeService constructor.
     */
    public function __construct()
    {
        $this->model = new Employee();
    }

    /**
     * Get all employees in the database
     *
     * @return Employee[]|Collection
     */
    public function findAll()
    {
        return Cache::remember('allEmployees', 600, function () {// remember for 10 minutes
            return $this->model->all();
        });
    }

    /** Count total employees
     *
     * @return int
     */
    public function totalEmployees()
    {
        return $this->model->all()->count();
    }

    /**
     * Delete an employee
     *
     * @param Employee $employee
     * @return bool|string|null
     * @throws Exception
     */
    public function delete(Employee $employee)
    {
        return $employee->delete();
    }

    /**
     * create an employee, add the employee's user and add distance from home to work
     *
     * @param Request $request
     * @return Employee|bool
     */
    public function create(Request $request)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $input['first_name'] . " " . $input['last_name'],
                'email' => $input['first_name'] . "." . $input['last_name'] . "@testcompany.com",
                'password' => Hash::make($input['first_name']),
            ]);

            if ($user) {
                $input['user_id'] = $user->id;
                $employee = $this->model->create($input);
            }

            DB::commit();

            EmployeeAddress::create([
                'employee_id' => $employee->id,
                'employee_address' => $input['address'],
                'employee_distance' => null,
            ]);
            return true;

        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }

    }

    /**
     * update employee's details
     *
     * @param Employee $employee
     * @param array $input
     */
    public function update(Employee $employee, array $input)
    {
        $employeeAddress = EmployeeAddress::where('employee_id', $employee->id)->first();

        if (!$employeeAddress) {
            $employeeAddress = EmployeeAddress::create([
                'employee_id' => $employee->id,
                'employee_address' => $input['address'],
                'employee_distance' => null,
            ]);
        }

        if ($input['address'] != $employeeAddress->employee_address) {
            $employeeAddress->employee_address = $input['address'];
            $employeeAddress->processed = false;
            $employeeAddress->save();
        }

        $employee->fill($input);
        $employee->save();
    }

}
