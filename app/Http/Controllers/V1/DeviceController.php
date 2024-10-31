<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\DeviceLogin;
use Illuminate\Http\Request;


class DeviceController extends Controller
{

    public function add(Request $request) {

        $identifier = $request->input('identifier');
        $name = $request->input('name');

        if($identifier === null || $name === null) {
            return response()->json(['response_code' => 400, 'response_message' => 'Name or Identifier cannot be empty.']);
        }

        $deviceLogin = DeviceLogin::create($request->only(['identifier', 'name']));

        return response()->json($deviceLogin);

    }

    public function delete(Request $request)
    {
        DeviceLogin::where([['identifier', '=', $request->input('identifier')], ['name', '=', $request->input('name')]])->delete();
        return response()->json(['response_code' => 200]);
    }

    public function devices(Request $request)
    {

        $identifier = $request->input('identifier');

        $deviceLogins = DeviceLogin::where('identifier', $identifier)->get();

        return response()->json($deviceLogins);

    }

}
