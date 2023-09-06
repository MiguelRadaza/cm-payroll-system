<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SoftwareUpdate extends Notification
{
    use Queueable;
    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        // 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)   
            ->line('System Update!')
            ->line('We are excited to inform you about some important changes to our system:')
            ->line('UI Change: We have refreshed the user interface to enhance your user experience.')
            ->line('Upcoming Features: Get ready for these upcoming features:')
            ->line('a. Tasks: Stay organized with a new task management feature.')
            ->line('b. Employee Shift Schedule: Easily manage employee schedules with our new tool.')
            ->line('c. Disbursement Payroll: Streamline your payroll process with our upcoming feature.')
            ->line('d. Dashboard Analytics View: Gain deeper insights into your data with an improved analytics dashboard.')
            ->line('Thank you for choosing our system, and we look forward to providing you with an even better user experience!')
            ->action('Login to Our Website', route('login'))
            ->line('Thank you for using our application!');
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

    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => $this->message
        ];
    }
}
