<?php

namespace highjin\QueueMonitor\Queries;

use highjin\QueueMonitor\Models\Monitor;

class MonitorQuery
{
    public static function getCurrentJob(): Monitor
    {
        return Monitor::ordered();
    }
}
