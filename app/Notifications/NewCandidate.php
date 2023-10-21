<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;
    public $id_offer;
    public $name_offer;
    public $user_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_offer, $name_offer, $user_id)
    {
        $this->id_offer = $id_offer;
        $this->name_offer = $name_offer;
        $this->user_id = $user_id;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notifications');
        return (new MailMessage)
                    ->line('You have new candidates in your offer: ' . $this->name_offer)
                    ->action('Go to notifications', $url)
                    ->line('Thank you for using DevJobs!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
    public function toDatabase($notifiable)
    {
        return [
            'id_offer' => $this->id_offer,
            'name_offer' => $this->name_offer,
            'user_id' => $this->user_id,

        ];
    }
}
