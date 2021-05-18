<?php

namespace App\Mail;

use App\Models\Tipo_user;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformacionMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject='Información de Usuario';
    public $info;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        $this->info=$info;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tipos = Tipo_user::all();
        return $this->view('email.informe')->with("tipos", $tipos);
    }
}
