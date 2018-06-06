<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manageblock extends Model
{
    // Table Name
    protected $table = 'manageblocks';

    // Primary Key
    public $primarykey = 'id';

    //Timestamps
    public $timestamps = true;
}
