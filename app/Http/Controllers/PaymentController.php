<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Curl;
use App\Models\CartDetail;
use App\Models\OrderDetail;
use App\Models\CartHeader;
use App\Models\OrderHeader;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        // Retrieve order items data from the request
        $orderItems = json_decode($request->input('order_items'));

        // Prepare line items for payment payload
        $lineItems = [];
        foreach ($orderItems as $item) {
            $lineItems[] = [
                'currency'    => 'PHP',
                'amount'      => $item->dish_price * 100, // Calculate total amount (in centavo) for each item x 100
                'description' => $item->dish_name,
                'name'        => $item->dish_name,
                'quantity'    => $item->qty,
            ];
        }

        // Construct payment payload
        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => $lineItems,
                    'payment_method_types' => ['gcash', 'card'],
                    'success_url' => 'http://127.0.0.1:8000/orders',
                    'cancel_url' => 'http://127.0.0.1:8000/cartHeaders',
                    'description' => 'Mama Sarah\'s Lettuce Garden'
                ],
            ]
        ];

        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
            ->withData($data)
            ->asJson()
            ->post();


        \Session::put('session_id',$response->data->id);

        $checkoutUrl = $response->data->attributes->checkout_url;
        $parsedUrl = parse_url($checkoutUrl);
        $relativePath = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';

        return redirect()->to($relativePath);

        // return redirect()->to($response->data->attributes->checkout_url);
    }

    public function success(Request $request)
    {
       $sessionId = \Session::get('session_id');


      $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/'.$sessionId)
                ->withHeader('accept: application/json')
                ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
                ->asJson()
                ->get();

      $userId = Auth::id();

        // Get cart header and details
        $cartHeader = CartHeader::where('user_id', $userId)->first();
        $cartDetails = CartDetail::where('cart_id', $cartHeader->id)->get();

        // Create order header
        $orderHeader = new OrderHeader();
        $orderHeader->user_id = $cartHeader->user_id;
        $orderHeader->status_id = 3; // Dispatch default
        $orderHeader->order_date = date('Y-m-d H:i:s');
        $orderHeader->save();

        // Create order details for each cart detail
        foreach ($cartDetails as $cartDetail) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $orderHeader->id;
            $orderDetail->dish_id = $cartDetail->dish_id;
            $orderDetail->qty = $cartDetail->qty;
            $orderDetail->save();
        }

        // Delete cart details to reset card header
        CartDetail::where('cart_id', $cartHeader->id)->delete();

        return redirect('/orders');
    }



    public function linkPay()
    {
        $data['data']['attributes']['amount'] = 150050;
        $data['data']['attributes']['description'] = 'Test transaction.';

         $response = Curl::to('https://api.paymongo.com/v1/links')
                    ->withHeader('Content-Type: application/json')
                    ->withHeader('accept: application/json')
                    ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
                    ->withData($data)
                    ->asJson()
                    ->post();

        dd($response);
    }

    public function linkStatus($linkid)
    {
         $response = Curl::to('https://api.paymongo.com/v1/links/'.$linkid)
                ->withHeader('accept: application/json')
                ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
                ->asJson()
                ->get();

        dd($response);
    }


    public function refund()
    {

        $data['data']['attributes']['amount']       = 5000;
        $data['data']['attributes']['payment_id']   = 'pay_sA83KrtmJUdue8prEHD6rZrY';
        $data['data']['attributes']['reason']       = 'duplicate';

         $response = Curl::to('https://api.paymongo.com/refunds')
                    ->withHeader('Content-Type: application/json')
                    ->withHeader('accept: application/json')
                    ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
                    ->withData($data)
                    ->asJson()
                    ->post();

        dd($response);
    }

    public function refundStatus($id)
    {
        $response = Curl::to('https://api.paymongo.com/refunds/'.$id)
                ->withHeader('accept: application/json')
                ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
                ->asJson()
                ->get();

        dd($response);
    }
}