<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string employee_number
 * @property string first_name
 * @property string last_name
 * @property string department
 * @property string phone_number
 * @property false|string hire_date
 * @property int designation_id
 * @property int gender_id
 * @property int employment_type_id
 * @property int user_id
 * @property false|string birth_date
 */
class Employee extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_number',
        'first_name',
        'last_name',
        'department',
        'phone_number',
        'hire_date',
        'designation_id',
        'gender_id',
        'employment_type_id',
        'user_id',
        'birth_date'
    ];

    /**
     * @return BelongsTo
     */
    public function designation()
    {
        return $this->belongsTo('App\Models\Designation');
    }

    /**
     * @return BelongsTo
     */
    public function employmentType()
    {
        return $this->belongsTo('App\Models\EmploymentType');
    }
}
