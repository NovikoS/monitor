<?php

namespace highjin\QueueMonitor;

use App\Jobs\EventMonitorJob;
use highjin\QueueMonitor\Data\MockResultData;
use highjin\QueueMonitor\Events\MockResultEvent;

class EventMonitor
{
    public static function mockResult(?array $data, ?array $errors, string $status)
    {
        $data = new MockResultData($data, $errors, $status);
        $job = new EventMonitorJob(new MockResultEvent($data));
        $job->onQueue('queue-monitor.queue');
        dispatch($job);
    }
}
