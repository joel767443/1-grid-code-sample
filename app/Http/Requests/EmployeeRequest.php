<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EmployeeRequest
 * @package App\Http\Requests
 */
class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'employee_number' => 'required',
                'first_name' => 'required',
                'address' => 'required',
                'last_name' => 'required',
                'department' => 'required',
                'phone_number' => 'required|regex:/(0)[0-9]{9}/',
                'hire_date' => 'date',
                'designation_id' => 'required|numeric',
                'gender_id' => 'numeric|required',
                'employment_type_id' => 'required|numeric',
                'birth_date' => 'date',
            ];
        }
        return [];
    }
}
