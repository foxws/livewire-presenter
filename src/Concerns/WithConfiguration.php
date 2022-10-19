<?php

namespace Foxws\Presenter\Concerns;

trait WithConfiguration
{
    protected bool $rememberVisibleFields = true;

    protected function setEnableVisibleRemember()
    {
        $this->rememberVisibleFields = true;
    }

    protected function setDisableVisibleRemember()
    {
        $this->rememberVisibleFields = false;
    }
}
