<?php

namespace Foxws\Presenter\Filters;

use Foxws\Presenter\Support\Attributable;

class Filter extends Attributable
{
    protected array $attributes = [];

    /** @var callable|null */
    protected $callableAttributes;

    public function name(string $name): self
    {
        $this->attributes(['name' => $name]);

        return $this;
    }

    public function label(string $label): self
    {
        $this->attributes(['label' => $label]);

        return $this;
    }

    public function component(string $component): self
    {
        $this->attributes(['component' => $component]);

        return $this;
    }

    public function disabled(bool $disabled = true): self
    {
        $this->attributes(['disabled' => $disabled]);

        return $this;
    }

    public function hidden(bool $hidden = true): self
    {
        $this->attributes(['hidden' => $hidden]);

        return $this;
    }

    public function value(mixed $value = null): self
    {
        $this->attributes(['value' => $value]);

        return $this;
    }

    public function toArray(): array
    {
        return [
            $this->attributes,
        ];
    }
}
