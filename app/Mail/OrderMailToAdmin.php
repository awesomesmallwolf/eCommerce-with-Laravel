<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=$this->data;
        $userdata=User::where('id',$data['user_id'])->first();
        return $this->from('example@example.com', 'Example')
                ->view('Mail.OrderMailToAdmin')->with([
                    'amount' => $data['amount'],
                    'payment_status'=>$data['payment_status'],
                    'transaction_id'=>$data['transaction_id'],
                    'coupon_used' => $data['coupon_used'],
                    'userid'=>$userdata
                ]);
    }
}
