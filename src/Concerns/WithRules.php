<?php

namespace Foxws\Presenter\Concerns;

trait WithRules
{
    protected array $rules = [];

    protected function rules(): array
    {
        return array_merge(
            config('presenter.rules'),
            $this->rules,
        );
    }

    protected function validateRequest(): void
    {
        rescue(
            fn () => $this->validate(),
            fn () => abort(400)
        );
    }
}
