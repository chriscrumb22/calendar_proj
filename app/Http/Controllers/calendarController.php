<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Events;


class calendarController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('calendar.index', ['param' => 'test']);
    }

    public function storeEvent(Request $request)
    {
        //$event = {};
        $event->event_name = $request->post['name'];

        //check if it exists or clear all the event on that range



        return true;
    }
}