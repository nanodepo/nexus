<?php

namespace NanoDepo\Nexus\Alert;

use Illuminate\Contracts\Session\Session;

final class Flash
{
    public const TYPE_KEY = 'alert_type';
    public const MESSAGE_KEY = 'alert_message';

    public function __construct(protected Session $session) {}

    public function has(): bool
    {
        return $this->session->has(self::MESSAGE_KEY);
    }

    public function get(): ?FlashMessage
    {
        if (!$this->has()) {
            return null;
        }

        return new FlashMessage(
            $this->session->get(self::MESSAGE_KEY),
            $this->session->get(self::TYPE_KEY, 'secondary')
        );
    }

    public function primary(string $message): void
    {
        $this->flash($message, 'primary');
    }

    public function secondary(string $message): void
    {
        $this->flash($message, 'secondary');
    }

    public function tertiary(string $message): void
    {
        $this->flash($message, 'tertiary');
    }

    public function error(string $message): void
    {
        $this->flash($message, 'error');
    }

    private function flash(string $message, string $type): void
    {
        $this->session->flash(self::TYPE_KEY, $type);
        $this->session->flash(self::MESSAGE_KEY, $message);
    }
}
