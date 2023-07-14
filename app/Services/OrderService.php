<?php
namespace App\Http\Controllers;
namespace App\Services;
use Illuminate\Support\Facades\Mail;
// use App\Services\Config;

class OrderService extends Config
{
    public function index()
    {
        // $order = new Order();
        // $orders = $order->getOrders();
        // $model = new Config();
        $orders = $this->getOrderModel()->getOrders();
        return view('order.show', compact('orders'));
    }

    public function sendEmail()
    {
        // dd(auth()->id());
        $data=['name'=>"Shahzaib",'data'=>"Hello"];
        $user['to']= '70078578@student.uol.edu.pk';
        $user['subject']= 'Your Order detail';
        Mail::send('order.email', $data, function($mesages) use($user){
            $mesages->to($user['to']);
            $mesages->subject($user['subject']);
        });

        return redirect()->route('showOrder')->with('success', 'Email send Successfully');
    }
}
