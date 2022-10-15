<?php

namespace Foxws\Presenter;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PresenterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('livewire-presenter')
            ->hasConfigFile('presenter')
            ->hasViews();
    }
}
