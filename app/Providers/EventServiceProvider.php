<?php

namespace App\Providers;

use App\Events\EntityPaymentPaid;
use App\Events\EventPaymentPaid;
use App\Events\EventSoftDeletingUser;
use App\Events\LeaderboardAddedEvent;
use App\Events\LeaderboardPositionFinished;
use App\Events\LeaderboardPositionFinishedEvent;
use App\Events\LeaderboardPositioning;
use App\Events\LicensePaymentPaid;
use App\Events\OrderPaymentPaid;
use App\Events\Payment\PaymentPaid;
use App\Listeners\CompetitorPaidNotification;
use App\Listeners\EventPaymentPaidNotification;
use App\Listeners\LicensePaidNotification;
use App\Listeners\LicensePaymentPaidNotification;
use App\Listeners\OrderPaidNotification;
use App\Listeners\OrderPaymentPaidNotification;
use App\Listeners\PaymentPaidNotification;
use App\Listeners\SoftDeletingUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PaymentPaid::class => [
            PaymentPaidNotification::class
        ],
        LicensePaymentPaid::class => [
            LicensePaidNotification::class,
        ],

       OrderPaymentPaid::class => [
           OrderPaidNotification::class,
        ],
        EventSoftDeletingUser::class => [
            SoftDeletingUser::class,
        ],
        EntityPaymentPaid::class => [
            EventPaymentPaidNotification::class,
            LicensePaymentPaidNotification::class,
            OrderPaymentPaidNotification::class
        ],
        EventPaymentPaid::class => [
            CompetitorPaidNotification::class,
        ],
        LeaderboardPositioning::class => [
            \App\Listeners\LeaderboardPositioning::class,
        ],
        LeaderboardPositionFinished::class => [
            \App\Listeners\RatingAthleteListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
