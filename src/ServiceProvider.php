<?php

namespace Timna\Hyphenate;

use Statamic\Providers\AddonServiceProvider;
use Timna\Hyphenate\Modifiers\Hyphenate;

class ServiceProvider extends AddonServiceProvider
{
	protected $modifiers = [
		Hyphenate::class
	];
}
