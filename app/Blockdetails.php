<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blockdetails extends Model
{
    // Table Name
    protected $table = 'blockdetails';

    // Primary Key
    public $primarykey = 'id';

    //Timestamps
    public $timestamps = true;
}
