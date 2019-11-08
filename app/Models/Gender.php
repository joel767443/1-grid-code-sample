<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gender
 * @package App\Models
 */
class Gender extends Model
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
