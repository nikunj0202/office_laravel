<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // Table Name
    protected $table = 'companies';

    // Primary Key
    public $primarykey = 'company_id';

    //Timestamps
    public $timestamps = true;
}
