Empower
=======

**Please note this package is still in development, it may change before mid-June, so please be patient.**

## What is it for?

This is needed for other packages made by Sorora to function fully, as it contains a lot of generic code that would be repeated otherwise.

This package is **not recommended for standalone use** - it is used to store common features among all other packages I'm creating for Laravel 4.

----

## Installation

You can install this package via composer by adding the below to your composer.json file:

    "sorora/empower" : "dev-master"

### Deployment made easy

Once you have installed your choice of sorora packages via composer, you can easily publish ALL of their configuration files and migrations with one simple command.

    php artisan empower:deploy "list,of,packages,from,sorora"
    // It also accepts an option of specifiying the Database Table prefix for migrated tables, you can do that like so:
    php artisan empower:deploy "aurp,bms" --prefix=myprefix

**Please note**: Empower is automatically added to the list of packages that will have their configuration and tables migrated!

### Optional

If you do not run the `empower:deploy` command, you **should** publish the configuration to your main project, so future updates do not override your config.

**Note:** You also need to add `'Sorora\Empower\Providers\EmpowerServiceProvider'` to your `app/config/app.php` file in the `providers` array

----

## Configuration Options

### "Admin" Panel

The admin panel is by default located at the url of **yoursite.com/sorora**, you can change this by editing the config.php file for Empower and changing the value associated with `baseurl`

### Database Table Prefixes

All packages from Sorora that create tables will prepend them with the prefix specified in the `dbprefix` option found in Empower's `config.php` - by default this value is blank. To add a prefix to tables created by Sorora packages, simply put the value in this configuration option.

    'dbprefix' => 'myprefix'
    // A table "users" would then be named "myprefixusers"

### Customisable Views

#### Custom Layout

You may not want to change the default views if you find them sufficient, but you can easily change what layout they extend by changing Empower's `config.php` option `layout`, the default is:

    'layout' => 'empower::layouts.master'

All content from views will be placed into a customisable section, by default it is set to `body` in the Empower `config.php` file.

    'section' => 'body'

#### Custom Views

Empower allows you to customise the experience a user has while using the packages available from Sorora. Packages by Sorora that come with default views can have these swapped out for your own custom views.

Each package that has this option will have a `views.php` in the config folder. For example, the Empower `config/views.php` file contains:

    return array(
        // Views for the "blog"
        'core' => array(
            'index'
        )
    );

To change the `index` view to a view of your choice, simply change it to be:

    return array(
        // Views for the "blog"
        'core' => array(
            'index' => true
        )
    );

Then ensure you have a view in the correct place, following this convention in the views folder: `packages/vendor/package/folder/file` ... In this case, it would be: `packages/sorora/empower/core/index.blade.php`

It's as simple as that!

### External Packages

To allow for all the Sorora packages to be accessed from the administration panel, it is important to add key value pairs to this array. The option is called `externals` in the `config.php` file in the Empower package. By default it is empty. This essentially loads the views into a navigation list, as an example, to add the Aurp navigation to the main navigation list, simply do:

    'aurp' => 'layouts.nav'

You can even add your own navigation lists, simply refer to the comments in the `config.php`!