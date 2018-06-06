<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machinedetails extends Model
{
    // Table Name
    protected $table = 'machinedetails';

    // Primary Key
    public $primarykey = 'machine_id';

    //Timestamps
    public $timestamps = true;
}
