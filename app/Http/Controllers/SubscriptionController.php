<?php

namespace Laratube\Http\Controllers;

use Laratube\Channel;
use Laratube\Subsciption;
use Laratube\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Channel $channel)
    {
        return $channel->subscriptions()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Laratube\Subsciption  $subsciption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel, Subscription $subscription)
    {
        $subscription->delete();

        return response()->json([]);
    }
}
