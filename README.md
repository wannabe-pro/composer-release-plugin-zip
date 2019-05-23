ZIP package builder extension for [`wannabe-pro/composer-release-plugin`](https://github.com/wannabe-pro/composer-release-plugin).
The name of build define target ZIP-file.

```json
{
    "require": {
        "wanna-be-pro/composer-release-zip": "*"
    },
    "extra": {
        "build-plugin": {
            "builder/package.zip": {
                "builder": "WannaBePro\\Composer\\Plugin\\Release\\ZipBuilder",
                "composer": {},
                "mapper": {}
            }
        }
    }
}
```