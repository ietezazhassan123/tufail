<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\UserOrder;



class OrderShipped extends Mailable
{
                use Queueable, SerializesModels;
                  

                public $order ;


                public function __construct(UserOrder $UserOrder)
                {
                    $this->order = $UserOrder;
                }


                public function build()
                {
                    return $this->markdown('emails.orders.shipped');
                }
}
