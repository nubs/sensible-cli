# sensible-cli
A PHP symfony/console command wrapper around [nubs/sensible][sensible] for
finding browsers, editors, and pagers.

## Requirements
This script requires PHP 5.6, or newer.

## Installation
This package uses [composer] so you can install it using composer.  Composer
can install the command globally using:
```bash
composer global require nubs/sensible-cli
```

This will install it to your `$COMPOSER_HOME` directory (typically
`$HOME/.composer`).  The `sensible` binary will be symlinked to
`$COMPOSER_HOME/vendor/bin/sensible` (e.g.,
`$HOME/.composer/vendor/bin/sensible`).

## Usage
The included `sensible` executable works much like Ubuntu's sensible-\*
utilities.  There are three commands for loading different programs:
`sensible browser` for viewing a URL, `sensible editor` for modifying a file,
and `sensible pager` for stepping through a file.

```bash
$ sensible browser http://www.example.com
```

## License
sensible-cli is licensed under the MIT license.  See [LICENSE](LICENSE) for
the full license text.

[sensible]: https://github.com/nubs/sensible
[composer]: https://getcomposer.org
