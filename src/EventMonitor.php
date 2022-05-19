<?php

namespace highjin\QueueMonitor;

use App\Jobs\EventMonitorJob;
use highjin\QueueMonitor\Data\MockResultData;
use highjin\QueueMonitor\Events\MockResultEvent;
use highjin\QueueMonitor\Models\Monitor;

class EventMonitor
{
    public static function mockResult(?array $data, ?array $errors, string $status)
    {

        $id = Monitor::ordered()->first(['job_id']);

        if (!$id){
            return;
        }

        $data = new MockResultData($data, $errors, $status, $id);
        $job = new EventMonitorJob(new MockResultEvent($data));
        dispatch($job);
    }
}
