<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Stripe;
use Session;
class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('stripe.home');
    }
  
    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
        try{
          return Redirect::to('https://buy.stripe.com/test_bIY5me7ckeFNewE9AA');
        }catch(Exception $e){
            return back()->withErrors($e);
        }
    }

    public function listOfPayments()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $paymentIntentId = 'pi_3Nv2pgSH7d5MCWVM1VSiEs1p'; 
        $paymentIntent=$stripe->paymentIntents->retrieve($paymentIntentId, []);
        $paymentData[]=$paymentIntent->amount;
        $paymentData[]=$paymentIntent->id;
        $paymentData[]=$paymentIntent->status;
        return view('stripe.history', ['paymentData' => $paymentData]);
    }
}