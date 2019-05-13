<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserBooking extends Notification
{
    use Queueable;

    protected $userProviders, $loggedInUser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userProviders, $loggedInUser)
    {
        $this->userProviders = $userProviders;
        $this->loggedInUser = $loggedInUser;
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
        $firstLine = 'The user '.$this->loggedInUser.' has booked a new reservation.';
        $mailMessage = new MailMessage;
        $mailMessage->subject('New user booking')
                    ->greeting('Dear Sarah,')
                    ->line($firstLine)
                    ->line('The booking details are:')
                    ->line('---');

        foreach ($this->userProviders as $userProvider) {
            $mailMessage
                    ->line('Provider:'.$userProvider->provider->name_en)
                    ->line('From:'.$userProvider->from_date)
                    ->line('To:'.$userProvider->to_date)
                    ->line('Nbr. Adults:'.$userProvider->nb_adults)
                    ->line('Nbr. Children:'.$userProvider->nb_children)
                    ->line('---');
        }

        return $mailMessage;
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
