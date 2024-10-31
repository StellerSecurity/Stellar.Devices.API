<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mockery\Mock;

class DeviceLogin extends Model
{

    protected $table = 'devices';

    protected $fillable = ['identifier', 'name'];

}
