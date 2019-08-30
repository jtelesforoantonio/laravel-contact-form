<?php

namespace JTelesforoAntonio\LaravelContactForm\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ContactMessage extends Notification
{
    /**
     * Name of the person sending the message
     *
     * @var string
     */
    public $name;

    /**
     * Subject message.
     *
     * @var string
     */
    public $subject;

    /**
     * Email of the person sending the message
     *
     * @var string
     */
    public $email;

    /**
     * Message
     * @var string
     */
    public $message;

    /**
     * Create a new notification instance.
     *
     * @param string $name
     * @param string $subject
     * @param string $email
     * @param string $message
     * @return void
     */
    public function __construct($name, $subject, $email, $message)
    {
        $this->name    = $name;
        $this->subject = $subject;
        $this->email   = $email;
        $this->message = $message;
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
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello ' . config('contact_form.name'))
                    ->subject($this->subject)
                    ->line('You have a new message')
                    ->line("Name: {$this->name}")
                    ->line("Email: {$this->email}")
                    ->line("Message: {$this->message}")
                    ->replyTo($this->email, $this->name);
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
