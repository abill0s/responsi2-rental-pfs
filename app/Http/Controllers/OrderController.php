<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  public function store(Request $request)
  {
    $request->validate([
      'user_id' => 'required|exists:users,id',
      'car_id' => 'required|exists:cars,id',
      'duration' => 'required|integer|min:1',
      'total_price' => 'required|numeric|min:0',
  ]);

    $order = Order::create([
      'user_id' => $request->user_id,
      'car_id' => $request->car_id,
      'duration' => $request->duration,
      'total_price' => $request->total_price,
  ]);
    
    return redirect()->route('order.show', $order->id)->with('success', 'Order berhasil dibuat!');
  }
  public function show($id)
{
    $order = Order::findOrFail($id);
    $car = Car::findOrFail($order->car_id);
    $user = User::findOrFail($order->user_id);
    return view('invoice', compact(['order', 'car', 'user']));
}
}
