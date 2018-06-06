<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    // Table Name
    protected $table = 'employees';

    // Primary Key
    public $primarykey = 'emp_id';

    //Timestamps
    public $timestamps = true;
}
