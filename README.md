# Laravel Active Menu
[![Build Status](https://travis-ci.org/sahibalejandro/laravel-active-menu.svg?branch=master)](https://travis-ci.org/sahibalejandro/laravel-active-menu)
[![Latest Stable Version](https://poser.pugx.org/sahibalejandro/laravel-active-menu/v/stable)](https://packagist.org/packages/sahibalejandro/laravel-active-menu)
[![Total Downloads](https://poser.pugx.org/sahibalejandro/laravel-active-menu/downloads)](https://packagist.org/packages/sahibalejandro/laravel-active-menu)
[![License](https://poser.pugx.org/sahibalejandro/laravel-active-menu/license)](https://packagist.org/packages/sahibalejandro/laravel-active-menu)

Blade directives for Laravel 5.1+ to manage menu states in a clean an easy way.

## Install
```
composer require sahibalejandro/laravel-active-menu
```

## Usage

Call `@activate(...)` to specify the activated menu:

```
@activate('security_settings')
```

Now call `@active(...)` directive to know if a specified menu is active:

```
<ul>
    <li>
        <a href="/settings">Settings</a>
        <ul class="dropdown">
            <li class="@active('security_settings')">
                <a href="/settings/security">Security</a>
            </li>
        </ul>
    </li>
</ul>
```

This directive will print the string `active` if the given menu is activated. The example above will result on the following HTML:

```
<ul>
    <li>
        <a href="/settings">Settings</a>
        <ul class="dropdown">
            <li class="active">
                <a href="/settings/security">Security</a>
            </li>
        </ul>
    </li>
</ul>
```


Now just add a `li.active a { ... }` styles to your CSS and you're ready.

## Using dot-notation

Use dot-notation to activate the menu cascade up, for example, using this directive:

```
@activate('settings.security')
```

This will activate `settings` and `settings.security`, so the following directives will print the string `active`:

```
@active('settings')
@active('settings.security')
```

## Change the class name

You can change the class name passing it as a second parameter:

```
@active('user.account', 'link-active')
```

But I really recomend you stick to the convention and use the default value.
