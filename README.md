# laravel-will-queue

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This package gives you ability to change notification type (instant or via queue) dynamically.

## Install

Via Composer

``` bash
$ composer require spinyman/laravel-will-queue
```

## Usage

1. First of all you have to deimplement ShouldQueue interface from all notification models:

	**class** EmailNotification **extends** Notification ~~**implements** ShouldQueue~~
2. Make changes in User model:

	~~**use** Illuminate\Notifications\Notifiable;~~
	
	**use** SpinyMan\WillQueue\Notifiable;
	``` php
	use SpinyMan\WillQueue\Notifiable;
	
	class User extends Authenticatable {
		use Notifiable;
		...
	}
	```

3.  somewhere use notify function with second optional bool param to indicate queue (true) or instant (false) notification (default: false):
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
[ico-downloads]: https://img.shields.io/packagist/dt/spinyman/laravel-will-queue.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/spinyman/laravel-will-queue
[link-downloads]: https://packagist.org/packages/spinyman/laravel-will-queue
[link-author]: https://github.com/spinyman
[link-contributors]: ../../contributors
