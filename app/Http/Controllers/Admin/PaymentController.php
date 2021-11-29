<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PaymentController extends Controller
{
    public function showPayment()
    {
        $categories = Category::query()->where('parent_id', 0)->get();
        return view('front.payment_details', compact('categories'));
    }

    public function savePayment(Request $request)
    {
        $order = Order::query()->create([
            'price' => Session::get('cart')->totalPrice,
            'status' => 0,
            'address_id' => $request->address_id,
            'user_id' => auth()->user()->id
        ]);

        foreach (Session::get('cart')->items as $item) {

            $order->orderDetails()->create([
                'product_id' => $item['item']->id,
                'count' => $item['qty'],
                'price' => $item['price'],
            ]);
        }


        $invoice = (new Invoice)->amount(Session::get('cart')->totalPrice);
        Session::forget('cart');
       return Payment::purchase($invoice,function($driver, $transactionId) use($order) {
            $order->update([
                'transaction_id'=>$transactionId
            ]);
        })->pay()->render();



    }

    public function callback(Request $request)
    {
        $order = Order::query()->where('transaction_id',$request->get('Authority'))->first();

        if($request->get('Status')=="OK"){
            $order->update([
                'status'=>1,
            ]);
        }

        return redirect()->route('home');
    }
}
