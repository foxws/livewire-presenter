<?php

namespace Foxws\Presenter\Concerns;

trait WithQueryString
{
    protected function queryString(): array
    {
        return [
            'page' => ['except' => 1, 'as' => 'p'],
            'search' => ['except' => '', 'as' => 'q'],
            'sort' => ['except' => '', 'as' => 's'],
            'direction' => ['except' => 'asc', 'as' => 'd'],
            'filter' => ['except' => '', 'as' => 'f'],
            'hidden' => ['except' => '', 'as' => 'h'],
        ];
    }
}
