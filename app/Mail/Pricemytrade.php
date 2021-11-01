<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Pricemytrade extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $datap;


    public function __construct($data,$datap)
    {
        //
        $this->data = $data;
        $this->datap = $datap;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->datap['email'], $this->datap['name'])
        ->subject(str_replace('-', ' ',$this->data['type']).' | AUTONEST CARS')
                ->markdown('frontend.email.pricemytrade.recieved');
    }
}
