<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class CurrencyController extends Controller
{

    public function details()
    {
        $response = file_get_contents('http://api.nobitex.ir/v2/orderbook/BTCIRT');

        $response = json_decode($response);

        return $response;
    }

    public function btc()
    {
        $response = file_get_contents('https://api.nobitex.ir/market/stats?srcCurrency=btc&dstCurrency=rls');

        $response = json_decode($response, true);

        return $response['stats']['btc-rls'];
    }

    public function checkPrice()
    {
        //This Task Is Updates Every Minute (Using Scheduling)

        $response = file_get_contents('https://api.nobitex.ir/market/stats?srcCurrency=btc&dstCurrency=rls');

        $response = json_decode($response, true);

        $btc = $response['stats']['btc-rls']['bestBuy'];

        return $btc;

    }

    public function notice($id)
    {
        $user = Alert::findorFail($id);

        if($user['price'] === $this->checkPrice()) {
            $invoice = [
                'id' => $id,
                'amount' => $this->checkPrice()
            ];

            $considered = User::findorFail($id);

            $considered->notify(new InvoicePaid($invoice));
        }else {
            echo 'The BTC Price Has Not Reached The Price You Set!!!';
        }

    }

    public function alert(Request $request)
    {
        $field = $request->validate([
            'price' => 'required'
        ]);

        $alert = Alert::create([
            'price' => $field['price']
        ]);

        $response = [
            'alert' => $alert
        ];

        return response($response, 201); 
    }

    public function invoice()
    {
        $invoice = [
          'id' => 1,
          'amount' => 2000
        ];

        Notification::send(User::all(), new InvoicePaid($invoice));
    }

    public function getNotification($id)
    {
        $user = User::find($id);

        return $user->notifications;
    }

    public function readNotification($id)
    {
        $user = User::findorFail($id);

        return $user->unreadNotifications[0]->markAsRead();
    }

}
