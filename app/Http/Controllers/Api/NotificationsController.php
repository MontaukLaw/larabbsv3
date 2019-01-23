<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Transformers\NotificationTransformer;
use App\Transformers\UserTransformer;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = $this->user->notifications()->paginate(20);

        return $this->response->paginator($notifications, new NotificationTransformer());
    }

    public function stats()
    {
        //$user = $this->user;
        ////$userStats=$user->notification_count;
        /// //return $this->response->item($userStats)
        /// //->setStatusCode(201);

        return $this->response->array([
            'unread_count' => $this->user()->notification_count,
        ]);
    }

    public function read()
    {
        $this->user->markAsRead();
    }
}