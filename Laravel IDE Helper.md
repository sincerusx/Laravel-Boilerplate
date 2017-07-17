# Laravel IDE Helper
[GitHub - barryvdh/laravel-ide-helper: Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)

Install with composer
`composer require barryvdh/laravel-ide-helper`

Install with composer as dev
`composer require --dev barryvdh/laravel-ide-helper`

providers array in config/app.php
`Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class`
Alternatively in app/Providers/AppServiceProvider.php add the following:
```
public function register()
{
    if ($this->app->environment() !== 'production') {
        $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }
    // ...
}
```

### Automatic phpDoc generation for Laravel Facades:
`php artisan ide-helper:generate`

`php artisan clear-compiled`

add to composer.json:
```
"scripts":{
    "post-update-cmd": [
        "Illuminate\\Foundation\\ComposerScripts::postUpdate",
        "php artisan ide-helper:generate",
        "php artisan ide-helper:meta",
        "php artisan optimize"
    ]
},
```


You can also publish the config file to change implementations (ie. interface to specific class) or set defaults for --helpers or --sublime.

```
php artisan vendor:publish --provider="Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider" --tag=config
```

### Automatic phpDocs for models
`composer require doctrine/dbal`

`php artisan ide-helper:models`

By default, models in app/models are scanned. The optional argument tells what models to use (also outside app/models).

`php artisan ide-helper:models Post User`

You can also scan a different directory, using the --dir option (relative from the base path):

`php artisan ide-helper:models --dir="path/to/models" --dir="app/src/Model"`

You can publish the config file (`php artisan vendor:publish`) and set the default directories.

Models can be ignored using the --ignore (-I) option

`php artisan ide-helper:models --ignore="Post,User"`

### Automatic phpDocs generation for Laravel Fluent methods
After publishing vendor, simply change the`include_fluent` line your config/ide-helper.php file into:
`'include_fluent' => true,`

run `php artisan ide-helper:generate`

### PhpStorm Meta for Container instances
`php artisan ide-helper:meta`


[GitHub - barryvdh/laravel-ide-helper: Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)


#Laravel/IDEHelper