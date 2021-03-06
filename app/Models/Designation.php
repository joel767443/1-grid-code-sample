<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Designation
 * @package App\Models
 */
class Designation extends Model
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
