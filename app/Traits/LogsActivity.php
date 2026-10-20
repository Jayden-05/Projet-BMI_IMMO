<?php

namespace App\Traits;

use App\Models\ActivityLog;

trait LogsActivity
{
    /**
     * Log an activity
     */
    protected function logActivity($action, $description = null)
    {
        if (auth()->check()) {
            ActivityLog::log($action, $description);
        }
    }
}
