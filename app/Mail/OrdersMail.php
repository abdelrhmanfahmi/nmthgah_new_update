<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrdersMail extends Mailable
{
    use Queueable, SerializesModels;
    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = (object)$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email')
                ->from('orders@namzgah.app')
                ->subject('طلب خدمة ، ' . @$this->data->name)
                ->with([
                    'name' => @$this->data->name,
                    'email' => @$this->data->email,
                    'mobile' => @$this->data->mobile,
                    'type' => @$this->data->type,
                    'side' => @$this->data->side,
                    'message' => @$this->data->message
                ]);
    }
}
