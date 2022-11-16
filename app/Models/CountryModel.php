<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    use HasFactory;
    ############ table name ############
    protected $table = '_z_country';

    ############ set timestamps to false ############
    public $timestamps = false;

    ############ table fields ############
    protected $fillable = [
       'iso',
       'name',
       'dname',
       'iso3',
       'position',
       'numcode',
       'phonecode',
       'created',
       'register_by',
       'modified',
       'modified_by',
    ];
}
