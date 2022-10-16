<?php

namespace Foxws\Presenter\Concerns;

trait WithQueryString
{
    protected function queryString(): array
    {
        return config('presenter.query_string');
    }
}
