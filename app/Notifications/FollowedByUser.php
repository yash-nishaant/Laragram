<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;

class FollowedByUser extends Notification
{
    use Queueable;
    public $user;

    // protected $casts = [
    //     'data' => 'array'
    // ]; 

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line($this->user->username . ' started following you.')
    //                 ->action('View profile', route('profile.show', ['id' => $this->user->id]))
    //                 ->line('Thank you for using our application!');
    // }

    public function toDatabase($notifiable)
    {
        return [
            'followedTime' => Carbon::now(),
            'username' => $this->user->username,
            'message' => $this->user->username . ' is following you.',
            'user' => $this->user,
            'profileimage' => $this->user->profile->image
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //          'username' => $this->user->username,
    //          'message' => $this->user->username . 'started following you.'
    //     ];
    // }
}
