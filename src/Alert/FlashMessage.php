<?php

namespace NanoDepo\Nexus\Alert;

final class FlashMessage
{
    public function __construct(protected string $message, protected string $type) {}

    public function message(): string
    {
        return $this->message;
    }

    public function type(): string
    {
        return $this->type;
    }
}
