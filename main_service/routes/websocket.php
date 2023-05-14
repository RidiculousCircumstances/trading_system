<?php


use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function ($websocket, Request $request) {
    $websocket->join('room1');
});

Websocket::on('disconnect', function ($websocket) {
//    $websocket->to('room1')->emit("message", $websocket->getUserId() . ' leaved room 1');
});

Websocket::on('message', function (Websocket $websocket, $data) {
    $websocket->broadcast()->to('room1')->emit('message', $data);
});
