<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;

class PayoutInvoice extends Notification implements ShouldQueue
{
    use Queueable;
    
    protected $ceoName;

    /**
     * Create a new notification instance.
     */
    public function __construct($ceoName)
    {
        $this->ceoName = $ceoName;
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
        $loginUrl = URL::route('login');
        return (new MailMessage)
            ->subject('Payout Received')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('We are pleased to inform you that you have received a payout.')
            ->line('This payout reflects your hard work and contributions. We appreciate your dedication to our organization.')
            ->line('Thank you for being a valuable member of our team.')
            ->action('Login to Your Account', $loginUrl)
            ->line('If you have any questions or concerns regarding this payout, please feel free to contact our support team at support@cm-payroll.chomuntinlupa.com.')
            ->salutation('Best regards,')
            ->line($this->ceoName)
            ->line('CEO')
            ->line(env('APP_NAME'));
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
}
