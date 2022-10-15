<?php

namespace Foxws\Presenter\Concerns;

trait WithRules
{
    protected function rules(): array
    {
        return config('presenter.rules');
    }

    protected function validateRequest(): void
    {
        rescue(
            fn () => $this->validate(),
            fn () => abort(400)
        );
    }
}
