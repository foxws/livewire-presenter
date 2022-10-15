<?php

namespace Foxws\Presenter\Fields;

use Foxws\Presenter\Support\Attributable;

class Field extends Attributable
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

    public function searchable(bool $searchable = true): self
    {
        $this->attributes(['searchable' => $searchable]);

        return $this;
    }

    public function sortable(bool $sortable = true): self
    {
        $this->attributes(['sortable' => $sortable]);

        return $this;
    }

    public function view(string $view): self
    {
        $this->attributes(['view' => $view]);

        return $this;
    }

    public function toArray(): array
    {
        return [
            $this->attributes,
        ];
    }
}
