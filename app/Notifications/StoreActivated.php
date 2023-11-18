<?php

namespace App\Notifications;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StoreActivated extends Notification
{
    use Queueable;

    protected $store;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Store $store)
    {
        $this->store = $store;
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
                    ->subject('Tienda activada')
                    ->greeting("Hola {$this->store->user->name}, en hora buena!")
                    ->line("Tu solicitud de apertura de su tienda {$this->store->name} a sido validado correctamente.")
                    ->line('Ya puedes empezar a registrar y publicar tus productos.')
                    ->action('Ir a mi cuenta', url('/dashboard'))
                    ->line('Gracias por su atención.');
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
