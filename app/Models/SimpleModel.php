<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimpleModel extends Model
{

    protected $casts = [
        'from'=>'date',
        'to'=>'date',
        'exact_date'=>'date',
        'something_toggle'=>'boolean'
    ];

    protected $attributes = [
        'something_toggle'=>false
    ];

    protected $guarded =[];

}
