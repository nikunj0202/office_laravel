<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viewblock extends Model
{
    // Table Name
    protected $table = 'blockdetails';

    // Primary Key
    public $primarykey = 'block_emp_id';

    //Timestamps
    public $timestamps = true;
}
