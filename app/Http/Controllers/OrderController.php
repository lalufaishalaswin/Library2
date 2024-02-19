<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function rent(Request $request, $id)
    {
        $is_exists = Order::where([
            ['account_id', '=', Auth::id()],
            ['ebook_id', '=', $id],
        ])->first();

        if ($is_exists) {
            return back();
        };
        $o = new Order();
        $o->account_id = Auth::id();
        $o->ebook_id = $id;
        $o->save();
        return back();
    }

    public function getCart()
    {
        $order = Order::with('Book')->where('account_id', Auth::id())->get();
        return view('cart', compact('order'));
    }

    public function delete(Request $request, $id)
    {
        Order::where([
            ['account_id', '=', Auth::id()],
            ['ebook_id', '=', $id],
        ])->delete();
        return back();
    }

    public function submit(Request $request)
    {
        Order::where([
            ['account_id', '=', Auth::id()],
        ])->delete();
        return redirect()->route('order.thx');
    }

    public function getThankyou()
    {
        return view('thankyou');
    }
}
