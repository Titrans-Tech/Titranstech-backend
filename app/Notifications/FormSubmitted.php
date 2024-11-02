<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Freetraining;


class FormSubmitted extends Notification
{
    use Queueable;

    protected $user;

    public function __construct(Freetraining $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Form Submission Confirmation')
        ->greeting('Hello, ' . $this->user->name)
        ->line('Thank you for submitting the form!')
        ->line('We have received your information.')
        ->action('Visit our site', url('/'))
        ->line('Thank you for using our application!');
    }
}