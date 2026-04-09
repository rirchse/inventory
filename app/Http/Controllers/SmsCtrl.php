<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Sms;

class SmsCtrl extends Controller
{
  public function index()
  {
    $user = auth()->user();
    $smses = Sms::where('shop_id', $user->shop_id)
    ->latest()
    ->paginate(25);
    return view('layouts.sms.index', compact('smses'));
  }

  public function send($recipients, $message)
  {
    $response = Http::get(env('SMS_API_URL'), [
      'user'     => env('SMS_USER'),
      'password' => env('SMS_PASS'),
      'from'     => env('SMS_MASKING'),
      'to'       => $recipients,
      'text'     => $message,
    ]);

    return $response;

    // if($response->successful())
    // {
    //   return "Message sent successfully!";
    // }

    // return "Failed to send message: " . $response->body();
  }
}
