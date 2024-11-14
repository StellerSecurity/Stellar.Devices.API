<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DeviceLogin extends Model
{

    use HasUuids;

    protected $table = 'devices';

    protected $fillable = ['identifier', 'name'];

}
