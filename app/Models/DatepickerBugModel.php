<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatepickerBugModel extends Model
{

    protected $casts = [
        'date' => 'datetime',
    ];

}
