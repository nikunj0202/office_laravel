<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editblock extends Model
{
    // Table Name
    protected $table = 'blockdetails';

    // Primary Key
    public $primarykey = 'id';

    // Unique Key
    public $uniquekey = 'block_emp_id';

    //Timestamps
    public $timestamps = true;
}
