<?php

namespace App\Http\Controllers\API;

use App\Core\Repositories\Notification\NotificationRepository;
use App\Http\Controllers\Controller;
use App\Http\Custom\Response;
use Illuminate\Http\Request;
use App\Http\Services\NotificationServices;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    private $push;

    /**
     *
     */
    public function __construct()
    {
        $this->push = new NotificationServices();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function push(NotificationRepository $notificationRepository)
    {
        $result = $notificationRepository->getAll();
        return Response::withData('true', '',  NotificationResource::collection($result));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function push_detail($id)
    {
        $detail = $this->push->detail($id);

        return Response::withData($detail['status'], '', ($detail['status'] == true) ? NotificationResource::make($detail['success']) : $detail['error']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function push_create(Request $request)
    {
        $create = $this->push->create($request);

        return Response::withoutData($create['status'], ($create['status'] == true) ? 'The push has been successfully created' : $create['error']);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function push_edit(Request $request, $id)
    {
        $edit = $this->push->edit($request, $id);

        return Response::withData($edit['status'], ($edit['status'] == true) ? 'Push information updated successfully' : $edit['error'], '');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function push_destroy($id)
    {
        $destroy = $this->push->destroy($id);

        return Response::withoutData($destroy['status'], ($destroy['status'] == true) ? 'Push user successfully destroy' : $destroy['error']);
    }


}
