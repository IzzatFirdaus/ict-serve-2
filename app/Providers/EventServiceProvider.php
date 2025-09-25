<?php

namespace App\Providers;

use App\Models;
use App\Observers\BlameableObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * The model observers for your application.
     *
     * @var array<class-string, array<int, object|string>|object|string>
     */
    protected $observers = [
        Models\Approval::class => [BlameableObserver::class],
        Models\DamageReport::class => [BlameableObserver::class],
        Models\Department::class => [BlameableObserver::class],
        Models\Equipment::class => [BlameableObserver::class],
        Models\EquipmentCategory::class => [BlameableObserver::class],
        Models\Grade::class => [BlameableObserver::class],
        Models\HelpdeskCategory::class => [BlameableObserver::class],
        Models\HelpdeskComment::class => [BlameableObserver::class],
        Models\HelpdeskTicket::class => [BlameableObserver::class],
        Models\LoanApplication::class => [BlameableObserver::class],
        Models\LoanApplicationItem::class => [BlameableObserver::class],
        Models\LoanTransaction::class => [BlameableObserver::class],
        Models\LoanTransactionItem::class => [BlameableObserver::class],
        Models\Location::class => [BlameableObserver::class],
        Models\Notification::class => [BlameableObserver::class],
        Models\Position::class => [BlameableObserver::class],
        Models\Setting::class => [BlameableObserver::class],
        Models\SubCategory::class => [BlameableObserver::class],
        Models\User::class => [BlameableObserver::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
