### One line installer
```curl -sS https://getcomposer.org/installer | php```

### require
The require command adds new packages to the composer.json file from the current directory.
```composer require vendor-name/package-name```

### install
The install command reads the composer.json file from the current directory, resolves the dependencies, and installs them into vendor.
If there is no composer.lock file, composer will create one after dependency resolution. The --no-scripts option is useful to bypass the configured pre and post scripts.
```composer install```

### update
Updates your dependencies to the latest version, and updates the composer.lock file.
```composer update```

### update --lock
Sometimes, you might get this warning:
```
Warning: The lock file is not up to date with the latest changes in composer.json, you may be getting outdated dependencies, run update to update them.
```
This could happen after you manually edited the composer.json (add or change the description, authors, extra config, etc). Even if your changes are meaningless for Composer, it detects that the md5sum of the file changed so it warns you that these modifications are not currently taken into account in the composer.lock file.

So to suppress this warning, you can just run the update --lock command to update the lock file without upgrading any vendors.
```composer update --lock```

### about
Short information about Composer.
```composer about```

### archive
Create an archive of this composer package.
```composer archive```

### browse
Aliased to `home`, opens the package's repository URL or homepage in your browser.
\\composer browse```

### clear-cache
Aliased to clearcache, clears composer's internal package cache.
\\composer clear-cache```

### config
Allows you to edit some basic composer settings in either the local composer.json file or the global config.json file.
```composer config --list```

### create-project
Create new project from a package into given directory.
```composer create-project symfony/standard-edition dir/```

### depends
Tell you which other packages depend on a certain package. You can specify which link types (require, require-dev) should be included in the listing. By default both are used.
```composer depends vendor-name/package-name```

### diagnose
If you think you found a bug, or something is behaving strangely, you might want to run the diagnose command to perform automated checks for many common problems.
```composer diagnose```

### global
The global command allows you to run other commands like `install`, `require` or `update` as if you were running them from the COMPOSER_HOME directory.

This can be used to install CLI utilities globally and if you add `$COMPOSER_HOME/vendor/bin` to your `$PATH` environment variable.
`$ composer global require friendsofphp/php-cs-fixer`
Now the `php-cs-fixer binary` is available globally (assuming you adjusted your PATH).
``` composer global```

### help
Display help for all the other commands: `composer help install`.
```composer help install```

### info
Show information about packages.
```composer info```

### init
Creates a basic composer.json file in current directory.
 
When you run the command it will interactively ask you to fill in the fields, while using some smart defaults.
```composer init```

### licenses
Show information about licenses of dependencies.
```composer licenses```

### list
Lists commands
```composer list```

### outdated
Shows a list of installed packages that have updates available (with colors!), including their current and latest versions. 
- Green: The package is up to date!
- Yellow: There's a new version, but possibly with BC break, there may be some work to install the new version.
- Red: There should be no BC break (semver), you should upgrade the package.
```composer outdated```

### prohibits
Tells you which packages are blocking a given package from being installed.
```composer prohibits```

### remove
Removes a package from the require or require-dev: `remove vendor/package vendor/package2`.
```composer remove```

### run-script
Run the scripts manually, just give it the script name and optionally `--no-dev` to disable the dev mode.
```composer run-script```

### search
Search for packages.
 
The search command allows you to search through the current project's package repositories. Usually, this will be just packagist. You simply pass it the terms you want to search for.
```composer search my keywords```

### self-update
Updates `composer.phar` to the lastest version.
 
Running the `self-update` command could solve some problems and save you some time too.
 
You can also use the `selfupdate` alias.
```composer self-update```

### show
List all of the available packages, you can use the show command like this` show -v symfony/symfony` to list the available versions.
```composer show```

### status
If you often need to modify the code of your dependencies and they are installed from source, the status command allows you to check if you have local changes in any of them.
```composer status```

### suggests
Lists all packages suggested by currently installed set of packages. You can optionally pass one or multiple package names in the format of `vendor/package` to limit output to suggestions made by those packages only.
```composer suggests```

### validate
Validates a composer.json.
You should always run the `validate` command before you commit your composer.json file, and before you tag a release. It will check if your `composer.json` is valid.
```composer validate```

### Example composer.json file
```
{
    "name": "vendor-name/project-name",
    "description": "This is a very cool package!",
    "version": "0.3.0",
    "type": "library",
    "keywords": ["logging", "cool", "awesome"],
    "homepage": "https://jolicode.com",
    "time": "2012-12-21",
    "license": "MIT",
    "authors": [
        {
            "name": "Xavier Lacot",
            "email": "xlacot@jolicode.com",
            "homepage": "http://www.lacot.org",
            "role": "Developer"
        },
        {
            "name": "Benjamin Clay",
            "email": "bclay@jolicode.com",
            "homepage": "https://github.com/ternel",
            "role": "Developer"
        }
    ],
    "support": {
        "email": "support@exemple.org",
        "issues": "https://github.com/jolicode/jane/issues",
        "forum": "http://www.my-forum.com/",
        "wiki": "http://www.my-wiki.com/",
        "irc": "irc://irc.freenode.org/composer",
        "source": "https://github.com/jolicode/jane",
        "docs": "https://github.com/jolicode/jane/wiki"
    },
    "require": {
        "monolog/monolog": "1.0.*",
        "joli/ternel": "@dev",
        "joli/ternel-bundle": "@stable",
        "joli/semver": "^2.0",
        "joli/package": ">=1.0 <1.1",
        "acme/foo": "dev-master#2eb0c097"
    },
    "require-dev": {
        "debug/dev-only": "1.0.*"
    },
    "conflict": {
        "another-vendor/conflict": "1.0.*"
    },
    "replace": {
        "debug/dev-only": "1.0.*"
    },
    "provide": {
        "debug/dev-only": "1.0.*"
    },
    "suggest": {
        "jolicode/gif-exception-bundle": "For fun!"
    },
    "autoload": {
        "psr-4": {
            "Monolog\\": "src/",
            "Vendor\\Namespace\\": ""
        },
        "psr-0": {
            "Monolog": "src/",
            "Vendor\\Namespace": ["src/", "lib/"],
            "Pear_Style": "src/",
            "": "src/"
        },
        "classmap": ["src/", "lib/", "Something.php"],
        "files": ["src/MyLibrary/functions.php"]
    },
    "autoload-dev": {
        "psr-0": {
            "MyPackage\\Tests": "test/"
        }
    },
    "target-dir": "Symfony/Component/Yaml",
    "minimum-stability": "stable",
    "repositories": [
        {
            "type": "composer",
            "url": "http://packages.example.com"
        },
        {
            "type": "vcs",
            "url": "https://github.com/Seldaek/monolog"
        },
        {
            "type": "pear",
            "url": "http://pear2.php.net"
        },
        {
            "type": "package",
            "package": {
              "name": "smarty/smarty",
              "version": "3.1.7",
              "dist": {
                "url": "http://www.smarty.net/Smarty-3.1.7.zip",
                "type": "zip"
              },
              "source": {
                "url": "http://smarty-php.googlecode.com/svn/",
                "type": "svn",
                "reference": "tags/Smarty_3_1_7/distribution/"
              }
            }
        },
        {
            "type": "artifact",
            "url": "path/to/directory/with/zips/"
        },
        {
            "type": "path",
            "url": "../../packages/my-package"
        }
    ],
    "config": {
        "process-timeout": 300,
        "use-include-path": false,
        "preferred-install": "auto",
        "store-auths": "prompt",
        "github-protocols": ["git", "https", "http"],
        "github-oauth": {"github.com": "oauthtoken"},
        "gitlab-oauth": {"gitlab.com": "oauthtoken"},
        "github-domains": ["entreprise-github.me.com"],
        "gitlab-domains": ["entreprise-gitlab.me.com"],
        "github-expose-hostname": true,
        "disable-tls": false,
        "cafile": "/var/certif.ca",
        "capath": "/var/",
        "http-basic": {"me.io":{"username":"foo","password":"bar"},
        "platform": {"php": "5.4", "ext-something": "4.0"},
        "vendor-dir": "vendor",
        "bin-dir": "bin",
        "data-dir": "/home/ternel/here",
        "cache-dir": "$home/cache",
        "cache-files-dir": "$cache-dir/files",
        "cache-repo-dir": "$cache-dir/repo",
        "cache-vcs-dir": "$cache-dir/vcs",
        "cache-files-ttl": 15552000,
        "cache-files-maxsize": "300MiB",
        "bin-compat": "auto",
        "prepend-autoloader": true,
        "autoloader-suffix": "pony",
        "optimize-autoloader": false,
        "sort-packages": false,
        "classmap-authoritative": false,
        "notify-on-install": true,
        "discard-changes": false,
        "archive-format": "tar",
        "archive-dir": "."
    },
    "archive": {
        "exclude": ["/foo/bar", "baz", "/*.test", "!/foo/bar/baz"]
    },
    "prefer-stable": true,
    "scripts": {
        "pre-install-cmd": "MyVendor\\MyClass::doSomething",
        "post-install-cmd": [
            "MyVendor\\MyClass::warmCache",
            "phpunit -c app/"
        ],
        "pre-update-cmd": "MyVendor\\MyClass::doSomething",
        "post-update-cmd": "MyVendor\\MyClass::doSomething",
        "pre-status-cmd": "MyVendor\\MyClass::doSomething",
        "post-status-cmd": "MyVendor\\MyClass::doSomething",
        "pre-package-install": "MyVendor\\MyClass::doSomething",
        "post-package-install": [
            "MyVendor\\MyClass::postPackageInstall"
        ],
        "pre-package-update": "MyVendor\\MyClass::doSomething",
        "post-package-update": "MyVendor\\MyClass::doSomething",
        "pre-package-uninstall": "MyVendor\\MyClass::doSomething",
        "post-package-uninstall": "MyVendor\\MyClass::doSomething",
        "pre-autoload-dump": "MyVendor\\MyClass::doSomething",
        "post-autoload-dump": "MyVendor\\MyClass::doSomething",
        "post-root-package-install": "MyVendor\\MyClass::doStuff",
        "post-create-project-cmd": "MyVendor\\MyClass::doThis",
        "pre-archive-cmd": "MyVendor\\MyClass::doSomething",
        "post-archive-cmd": "MyVendor\\MyClass::doSomething",
    },
    "extra": { "key": "value" },
    "bin": ["./bin/toto"]
}
```