<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmploymentType
 * @package App\Models
 */
class EmploymentType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'label', 'description',
    ];
}
