<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderViewApartment extends Mailable
{
    use Queueable, SerializesModels;

    protected $_object;

    public function __construct($_object)
    {
        $this->_object = $_object;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order-view-apartment')
            ->with([
                'name' => $this->_object['name'],
                'phone' => $this->_object['phone'],
            ]);
    }
}
