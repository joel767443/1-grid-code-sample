<?php


namespace App\Services;


use App\Models\Employee;
use Exception;
use Illuminate\Database\Eloquent\Collection;

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
     * @return Employee[]|Collection
     */
    public function findAll()
    {
        return $this->model->all();
    }

    /**
     * @return int
     */
    public function totalEmployees()
    {
        return $this->model->all()->count();
    }

    /**
     * @param Employee $employee
     * @return bool|string|null
     */
    public function delete(Employee $employee)
    {
        try {
            return $employee->delete();
        } catch (Exception $e) {
            return $e;
        }
    }
}
