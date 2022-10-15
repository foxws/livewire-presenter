# A lightweight Livewire presenter component

[![Latest Version on Packagist](https://img.shields.io/packagist/v/foxws/livewire-presenter.svg?style=flat-square)](https://packagist.org/packages/foxws/livewire-presenter)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/foxws/livewire-presenter/run-tests?label=tests)](https://github.com/foxws/livewire-presenter/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/foxws/livewire-presenter/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/foxws/livewire-presenter/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/foxws/livewire-presenter.svg?style=flat-square)](https://packagist.org/packages/foxws/livewire-presenter)

## Installation

You can install the package via composer:

```bash
composer require foxws/livewire-presenter
```

## Usage

```php
<?php

use Foxws\Presenter\Columns\Column;
use Foxws\Presenter\Presenter;
use Foxws\Presenter\Filters\Filter;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class UserOverviewController extends Presenter
{
    public function mount()
    {
        //
    }

    public function render(): View
    {
        return view('users.overview')
            ->layout('layouts.app')
            ->with([
                'builder' => $this->builder(),
            ]);
    }

    protected function builder(): LengthAwarePaginator
    {
        return User::all()
            ->sort(column: $this->sort, direction: $this->direction)
            ->paginate(perPage: $this->perPage);
    }

    protected function columns(): array
    {
        return [
            Column::new()
                ->name('name')
                ->label(__('Name'))
                ->view('users.presenter.name')
                ->sortable(),

            Column::new()
                ->name('email')
                ->label(__('Email'))
                ->view('users.presenter.email'),
        ];
    }

    protected function filters(): array
    {
        return [
            Filter::new()
                ->name('created_at')
                ->label(__('Created At'))
                ->value(now()->subDays(90)),
        ];
    }
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [foxws](https://github.com/foxws)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
