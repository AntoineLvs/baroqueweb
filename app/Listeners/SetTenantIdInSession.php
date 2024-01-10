<?php

namespace App\Listeners;

class SetTenantIdInSession
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // multi tenant

        session()->put('tenant_id', $event->user->tenant_id);
    }
}
