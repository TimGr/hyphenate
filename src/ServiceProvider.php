<?php

namespace Timnarr\Hyphenate;

use Statamic\Providers\AddonServiceProvider;
use Timnarr\Hyphenate\Modifiers\Hyphenate;

class ServiceProvider extends AddonServiceProvider
{
	protected $modifiers = [
		Hyphenate::class
	];
}
