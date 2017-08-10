### Migrating from npm
##### Run first in your project directory on the command line.
```yarn```

##### Change Angular CLI to use yarn
``` ng set --global package-manager=yarn ```

### Install Packages

##### Install a package, update the packag­e.json and yarn.lock files
``` yarn add <package-name> ```


##### Install a specific version of a package, update the packag­e.json and yarn.lock files
```yarn add <package-name>@­<version-number>```

##### Install to dev depend­encies
```yarn add <package-name> --dev```

##### Install a package globally
```yarn global add <package-name>```

##### Get the global cache directory
```yarn cache dir```

##### Restore Packages defined in packag­e.json
```yarn install```

### Uninstall Packages
##### Uninstall, remove from packag­e.json, remove from yarn.lock
```yarn remove <package-name>```
##### Uninstall a global package
```yarn global remove <package-name>```
##### Clean from the yarn cache
```yarn cache clean```