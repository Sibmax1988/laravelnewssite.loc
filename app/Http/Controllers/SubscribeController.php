<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Illuminate\Support\Facades\Response;


class SubscribeController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {

        $subscriber = Subscriber::where('email', 'LIKE', $request->input('email'))->get();

        if (!$subscriber->isEmpty()) {
            $perem = 'Подписка на адрес '. $request->input('email') .' уже оформлена ранее';
            return response()->json(['subResult' => $perem], 200);
        } else {

            $newSubscriber = new Subscriber;
            $newSubscriber->email = $request->email;
            $newSubscriber->save();
            $perem = 'Подписка на адрес ' . $request->input('email') . ' оформлена';
            return response()->json(['subResult' => $perem], 200);

        }

    }


}


