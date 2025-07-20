<?php

namespace NanoDepo\Nexus\Traits;

trait WithModal
{
    public bool $opened = false;

    public function open(): void
    {
        $this->opened = true;
    }

    public function close(): void
    {
        $this->opened = false;
    }
}
