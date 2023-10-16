<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\StudentSubscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe;

class PaymentStripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        DB::beginTransaction();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $request->price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Subscription package purchased"
        ]);
        $subscribe = StudentSubscription::create([
            'price' => $request->price,
            'program_no' => $request->program_no,
            'package_id' => $request->package_id,
            'user_id' => Auth::user()->id,
            'active' => true,
        ]);
        $id = Auth::user()->id;
        $user = User::findorFail($id);
        $data = [
            'subscription' => true,
            'stripe_id' => $subscribe->id,
            'program_no' => $request->program_no,
        ];
        $res = $user->update($data);
        DB::commit();
        Session::flash('message', 'Payment successful!');
        Session::flash('status', true);
        Session::flash('icon', 'success');
        Session::flash('heading', 'Success');
        return back();
    }
}
