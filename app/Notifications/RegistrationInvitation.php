<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationInvitation extends Notification
{
    use Queueable;


    protected $invitationKey;
    protected $registrationDeadline;
    protected $invitationEmail;
    protected $registrationLink;

    /**
     * Create a new notification instance.
     */
    public function __construct($invitationKey, $invitationEmail, $registrationDeadline, $registrationLink)
    {
        $this->invitationEmail = $invitationEmail;
        $this->invitationKey = $invitationKey;
        $this->registrationDeadline = $registrationDeadline;
        $this->registrationLink = $registrationLink;
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
     * Route notifications for the mail channel.
     *
     * @return  array<string, string>|string
     */
    public function routeNotificationForMail(Notification $notification): array|string
    {
        return $this->invitationEmail;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $appName = config('app.name');

        return (new MailMessage)
                    ->subject('Invitation to Register for CM-Payroll System')
                    ->greeting('Dear ' . $this->invitationEmail . ',')
                    ->line('We are excited to invite you to register for the CM-Payroll System, a comprehensive solution designed to simplify payroll management for your organization.')
                    ->line('**Invitation Details:**')
                    ->line('Invitation Key: ' . $this->invitationKey)
                    ->line('Registration Deadline: ' . $this->registrationDeadline)
                    ->line('Registration Link: ' . $this->registrationLink)
                    ->line('**About CM-Payroll System:**')
                    ->line('The CM-Payroll System is a powerful tool that offers a range of features to streamline your payroll processes, ensuring accuracy and efficiency. With our user-friendly interface, you can easily manage employee information, calculate salaries, handle deductions, generate payslips, and more. Our system is designed to save you time and reduce administrative overhead, giving you more time to focus on your core business activities.')
                    ->line('**How to Register:**')
                    ->line('1. Click on the registration link provided above.')
                    ->line('2. Enter your personal information and create your account credentials.')
                    ->line('3. Use the invitation key ' . $this->invitationKey . ' when prompted during registration.')
                    ->line('4. Complete the registration process and start experiencing the benefits of the CM-Payroll System.')
                    ->line('Please note that the registration deadline is ' . $this->registrationDeadline . '. Ensure you complete your registration before this date to gain access to the system.')
                    ->line('If you have any questions or need assistance with the registration process, please don\'t hesitate to contact our support team at support@cm-payroll.chomuntinlupa.com.')
                    ->line('We look forward to welcoming you to the CM-Payroll System and assisting you in streamlining your payroll management.')
                    ->salutation('Best regards,')
                    ->line($this->invitationEmail)
                    ->line($appName)
                    ->line('support@cm-payroll.chomuntinlupa.com');
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
