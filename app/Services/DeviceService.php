<?php

namespace App\Services;

use App\Models\DeviceLogin;

class DeviceService
{

    public function findByIdentifierAndName(string $identifier, string $name)
    {
        $device = DeviceLogin::where([['identifier', '=', $identifier], ['name', '=', $name]])->first();
        return $device;
    }

}
