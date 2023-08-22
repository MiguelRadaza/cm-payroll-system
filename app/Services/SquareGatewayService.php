<?php

namespace App\Http\Controllers;
use App\Models\User;
use Nikolag\Square\Facades\Square;

class SquareGatewayService extends Controller
{
    public function charge($data)
    {
        $transaction = Square::charge([
            'amount',
            'card_nonce',
            'location_id',
            'currency' => 'PHP'
        ]);

        return response()->json(compact('transaction'));
    }
}