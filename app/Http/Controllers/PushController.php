<?php

namespace App\Http\Controllers;

use App\Push;
use Davibennun\LaravelPushNotification\Facades\PushNotification;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PushController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('push.index');
    }

    /**
     * Register device token
     *
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return response("user input error", 400);
        }

        $token = $request->all();

        $device_token = new Push();
        $device_token->token = $token['token'];
        $device_token->type = $token['type'];

        if($device_token->save()) {
            return response("success", 200);
        } else {
            return response("server error", 500);
        }

    }

    /**
     * Send push notifications
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendPush(Request $request)
    {

        //TODO This module has to be finishet with gcm
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'tbMessage' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('push_notifications')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $tokens = Push::firstOrFail();

        $devices = PushNotification::DeviceCollection(array(
            PushNotification::Device('APA91bGBacrRhMjR_NbTGgaUDhm3RJvPo1KABST4FBuallUe21usNlmeCuf06g1hYARl3aumDDyNvsJRxbqe8hylrNwWm535laevdl_mTC_iuM8WsP4QrtQTtXN5eRAWQk1EcbDsdI2E')
        ));
        $message = PushNotification::Message('Message Text',array(
            'badge' => 1,
            'sound' => 'example.aiff',

            'actionLocKey' => 'Action button title!',
            'locKey' => 'localized key',
            'locArgs' => array(
                'localized args',
                'localized args',
            ),
            'launchImage' => 'image.jpg',

            'custom' => array('custom data' => array(
                'we' => 'want', 'send to app'
            ))
        ));

        $collection = PushNotification::app('tjMirageIOS')
            ->to($devices)
            ->send($message);

        // get response for each device push
        $response = [];
        foreach ($collection->pushManager as $push) {
            $response[] = $push->getAdapter()->getResponse();
        }
        dd($response);

    }
}
