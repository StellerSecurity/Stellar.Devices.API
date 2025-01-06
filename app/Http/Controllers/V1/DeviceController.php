<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\DeviceLogin;
use App\Services\DeviceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class DeviceController extends Controller
{

    public function __construct(private DeviceService $deviceService)
    {

    }

    public function add(Request $request): JsonResponse
    {

        $identifier = $request->input('identifier');
        $name = $request->input('name');

        if($identifier === null || $name === null) {
            return response()->json(['response_code' => 400, 'response_message' => 'Name or Identifier cannot be empty.']);
        }

        $device = $this->deviceService->findByIdentifierAndName($identifier, $name);

        if($device !== null) {
            return response()->json(['response_code' => 409, 'response_message' => 'Device (identifier, name) already exists. Please try another combination.']);
        }

        $deviceLogin = DeviceLogin::create($request->only(['identifier', 'name']));

        return response()->json($deviceLogin);

    }

    public function delete(Request $request): JsonResponse
    {

        $identifier = $request->input('identifier');
        $name = $request->input('name');

        if($identifier === null || $name === null) {
            return response()->json(['response_code' => 400, 'response_message' => 'Name or Identifier cannot be empty.']);
        }

        $device = $this->deviceService->findByIdentifierAndName($identifier, $name);

        if($device === null) {
            return response()->json(['response_code' => 400, 'response_message' => 'Device not found.']);
        }

        $device->delete();

        return response()->json(['response_code' => 200]);
    }



    public function devices(Request $request): JsonResponse
    {

        $identifier = $request->input('identifier');

        if($identifier === null) {
            return response()->json(['response_code' => 400, 'response_message' => 'Identifier cannot be empty.']);
        }

        $deviceLogins = $this->deviceService->findByIdentifier($identifier);
        return response()->json($deviceLogins);

    }

}
