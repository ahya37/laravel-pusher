<?php

namespace App\Http\Controllers;

use ExpoSDK\ExpoMessage;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotif()
    {
        $message = (new ExpoMessage([
            'title' => 'initial title',
            'body'  => 'initial body'
        ]))
            ->setTitle('This title overrides initial title')
            ->setBody('This notification body overrides initial body')
            ->setData(['id' => 1])
            ->setChannelId('default')
            ->setBadge(0)
            ->playSound();
    }
}
