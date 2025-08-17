<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function print($codigo)
    {
        $order = Order::select([
            'orders.customer_id',
            'orders.*',
            'customers.name as customer_name',
            'customers.email as customer_email',
            'customers.phone as customer_phone',
            'customers.image as customer_image',
        ])
            ->leftjoin('customers', 'customers.id', '=', 'orders.customer_id')
            ->where('orders.id', $codigo)
            ->first();


        $pdf = Pdf::loadView('pages.order-pdf', ['order' => $order]);
        return $pdf->stream('order.pdf');
    }
}
