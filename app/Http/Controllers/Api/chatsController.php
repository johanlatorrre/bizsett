<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class chatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats=Chat::included()
        ->filter()
        ->sort()
        ->get();
    return $chats;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chat=Chat::create($request->all());
        return $chat; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $id)
    {
        $chat = Chat::included()->findOrFail($id);
        return $chat;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        $chat-> update ($request-> all());
        return $chat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        $chat-> delete ();
        return $chat;
    }
}
