<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Utilisateur;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\API\NotificationRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;

class NotificationController extends AppBaseController
{
    private $notify;
    
    /**
     * __construct
     *
     * @param  mixed $notification
     * @return void
     */
    public function __construct(NotificationRepository $notification)
    {
        $this->notify = $notification;
    }

    /**
     * @param $utilisateur_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNotifications()
    {
       try {
            $notifications = $this->notify->latest()->get();
            $collection = new Collection([]);
            foreach($notifications as $notification) {
                $data = [
                    'notification' => $notification,
                    'admin' => $notification->admin,
                    'utilisateur' => $notification->utilisateur,
                    'file' => $notification->media,
                ];
                $collection->push($data);
            }
            return $this->sendResponse($collection, 'Liste des notifications');
            
        }catch(\Exception $e){
            return $this->sendError("Erreur de récupération des notifications $e");
        }
    }

            
    /**
     * createNotification
     *
     * @param  mixed $request
     * @return void
     */
    public function createNotification(Request $request)
    {
        $data = $request->all();
        if(!empty($data['file'])) {
            $validator = Validator::make($data, [
                'file' => 'required|max:1048576',
            ], [
                'file.required' => 'Le fichier doit être séléctionné',
                'file.max' => 'La taille du fichier ne doit pas dépasser 1Gb',
            ]);
            if($validator->fails())
                return $this->sendError($validator->errors());
            $user = Utilisateur::where('nom', $data['user'])->first();
            $files = $request->file('file');
            $destinationPath = public_path('storage/notification/');
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert = $this->notify->create([
                'texte' => $data['texte'],
                'utilisateur_id' => $user->id,
                'admin_id' => $data['admin_id'],
            ]);
            Media::create([
                'src' => env('APP_URL') . "/public/storage/notification/$profileImage",
                'source_id' => $insert->id,
                'source' => 'notification'
            ]);
        }
        else {
            $user = Utilisateur::where('nom', $data['user'])->first();
            $insert = $this->notify->create([
                'texte' => $data['texte'],
                'utilisateur_id' => $user->id,
                'admin_id' => $data['admin_id'],
            ]);  
        }

        if($insert)
            return $this->sendSuccess('Notification crée !');
        else
            return $this->sendError('Erreur de création de la notification');
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

    public function updateNotification(Request $request)
    {
        $data = $request->all();
        $notif = $this->notify->latest()->where('id', $data['id'])->first();
        $update = $notif->update([
            'texte' => $data['texte']
        ]);
        if($update)
            return $this->sendSuccess('Mise à jour effectué !');
        else
            return $this->sendError('Erreur de modification');
    }
}
