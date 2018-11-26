# laravel-will-queue

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Sometimes you need more flexibility and be able to change notification type (instant or via queue) dynamically. So this package for you.

## Install

Via Composer

``` bash
$ composer require spinyman/laravel-will-queue
```

## Usage

``` php
//replace this line:
//use Illuminate\Notifications\Notifiable;
//with next one:
use SpinyMan\WillQueue\Notifiable;

class User extends Authenticatable {
	use Notifiable;
	...
}
```

...and somewhere use notify function with second optional bool param to indicate queue (true) or instant (false) notification (default: false):
``` php
$user = User::find(1);
$user->notify(new EmailNotification() [, true|false]);
```
OR if you are really sure to notify using queue:
``` php
$user = User::find(1);
$user->notifyFromQueue(new EmailNotification());
```

[ico-version]: https://img.shields.io/packagist/v/spinyman/laravel-will-queue.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/spinyman/laravel-will-queue/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/spinyman/laravel-will-queue.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/spinyman/laravel-will-queue.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/spinyman/laravel-will-queue.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/spinyman/laravel-will-queue
[link-travis]: https://travis-ci.org/spinyman/laravel-will-queue
[link-scrutinizer]: https://scrutinizer-ci.com/g/spinyman/laravel-will-queue/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/spinyman/laravel-will-queue
[link-downloads]: https://packagist.org/packages/spinyman/laravel-will-queue
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
