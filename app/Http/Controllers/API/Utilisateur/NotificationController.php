<?php

namespace App\Http\Controllers\Api\Utilisateur;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\API\NotificationRepository;
use Illuminate\Database\Eloquent\Collection;

class NotificationController extends AppBaseController
{
    private $notify;

    public function __construct(NotificationRepository $notification)
    {
        $this->notify = $notification;
    }

    /**
     * @param $utilisateur_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNotifications($utilisateur_id)
    {
       try {
            $notifications = $this->notify->latest()->get();
            $collection = new Collection([]);
            foreach($notifications as $notification) {
                $data = [
                    'notification' => $notification,
                    'admin' => $notification->admin,
                    'utilisateur' => $notification->utilisateur,
                ];
                $collection->push($data);
            }
            return $this->sendResponse($collection, 'Liste des notifications');
            
        }catch(\Exception $e){
            return $this->sendError("Erreur de récupération des notifications $e");
        }
    }

    /**
     * @param $notification_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNotification($notification_id)
    {
       try {
            $notification = Notification::find($notification_id);
            return response()->json(['success' => true, 'notifications' => $notification]);
        }catch(\Exception $e){
            return response()->json(['success' => false]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delNotification(Request $request)
    {
        $notification = $this->notify->delete($request->notification_id);
        return $this->sendSuccess('Notification supprimé');
    }
}
