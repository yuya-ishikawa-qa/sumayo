<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    // パラメータ
    public $flight_order;
    public $flight_customer;
    public $item_list;
    public $store;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($flight_order,$flight_customer,$item_list,$store,$user)
    {
        $this->flight_order = $flight_order;
        $this->flight_customer = $flight_customer;
        $this->item_list = $item_list;
        $this->store = $store;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->user->email)->view('order_mail')->with([
            'flight_order' => $this->flight_order,
            'flight_customer' => $this->flight_customer,
            'item_list' => $this->item_list,
            'store' => $this->store,
            'user' => $this->user,
        ]);
    }
}
