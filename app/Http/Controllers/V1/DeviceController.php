<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\DeviceLogin;
use Illuminate\Support\Facades\Request;

class DeviceController extends Controller
{

    public function add(Request $request) {

        $identifier = $request->input('identifier');
        $name = $request->input('name');

        $deviceLogin = DeviceLogin::add($request->only(['identifier', 'name']));

        return response()->json($deviceLogin);


    }

    public function devices(Request $request)
    {

        $identifier = $request->input('identifier');

        $deviceLogins = DeviceLogin::where('identifier', $identifier)->get();

        return response()->json($deviceLogins);

    }

}
