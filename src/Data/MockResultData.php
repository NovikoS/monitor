<?php

namespace highjin\QueueMonitor\Data;

class MockResultData implements AbstractData
{
    const MOCK_STATUS_IN_LISTENER = 'listener';
    const MOCK_STATUS_SENT = 'sent';
    public ?array $data;
    public ?array $errors;
    public string $status;

    public function __construct(?array $data, ?array $errors, string $status)
    {
        $this->data = $data ?? null;
        $this->errors = $errors ?? null;
        $this->status = $status;
    }
}
