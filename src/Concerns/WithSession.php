<?php

namespace Foxws\Presenter\Concerns;

trait WithSession
{
    protected function sessionKey(): string
    {
        $className = str_split(static::class);
        $crc32 = sprintf('%u', crc32(serialize($className)));

        return 'presenter-'.base_convert($crc32, 10, 36);
    }

    protected function setSession(string $key, mixed $value = null): void
    {
        session(["{$this->sessionKey()}_{$key}" => $value]);
    }

    protected function getSession(string $key, mixed $default = null): mixed
    {
        return session("{$this->sessionKey()}_{$key}", $default);
    }

    protected function hasSession(string $key): bool
    {
        return session()->has("{$this->sessionKey()}_{$key}");
    }

    protected function pullSession(string $key, mixed $default = null): mixed
    {
        return session()->pull("{$this->sessionKey()}_{$key}", $default);
    }
}
