<?php

namespace App\Http\Services;

use App\Core\Repositories\Notification\NotificationRepository;
use App\Http\Controllers\BaseController;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationServices extends BaseController
{

    /**
     * @param $id
     * @return array
     */
    public function detail($id)
    {
        $check = Notification::where('id', $id)->first();

        if ($check) {
            return ['success' => $check, 'status' => true];
        }

        return ['error' => 'Error please try again', 'status' => false];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required|string' ,
        ]);

        if ($validated->fails()) {
            $fails = array_values($validated->getMessageBag()->toArray())[0];
            $error = $fails[0];
            return ['error' => $error, 'status' => false];
        }

        $create = Notification::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($create) {
            return ['error' => ['Push created successfully.'], 'status' => true];
        }

        return ['error' => 'Error please try again', 'status' => false];
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function edit(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'max:255',
            'description' => 'required|string' ,

        ]);

        if ($validated->fails()) {
            $fails = array_values($validated->getMessageBag()->toArray())[0];
            $error = $fails[0];
            return ['error' => $error, 'status' => false];
        }

        $check = Notification::where('id', $id)->first();

        if ($check) {

            Notification::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return ['error' => ['Push updated successfully.'], 'status' => true];
        }
        return ['error' => 'Error please try again', 'status' => false];

    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        $check = Notification::where('id', $id)->first();

        if ($check) {
            Notification::where('id', $id)->delete();
            return ['success' => '', 'status' => true];
        }

        return ['error' => 'Error please try again', 'status' => false];
    }


}
