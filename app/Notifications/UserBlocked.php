<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserBlocked extends Notification
{
    use Queueable;

    protected $user;

    protected $reason;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $reason)
    {
        $this->user = $user;
        $this->reason = $reason;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Cuenta deshabilitada')
                    ->greeting("Hola {$this->user->name}")
                    ->line('Lo sentimos, has perdido el acceso a nuestra platarforma, ya que has ')
                    ->line("{$this->reason}")
                    ->line('Para poder solicitar una reapertura por favor complete este formulario.')
                    ->action('solicitar reapertura', url('/'))
                    ->line('Gracias por su atención, que tenga un buen día.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
