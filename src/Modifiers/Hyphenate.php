<?php

namespace Timnarr\Hyphenate\Modifiers;

use Illuminate\Support\Facades\App;
use Org\Heigl\Hyphenator\Hyphenator;
use Org\Heigl\Hyphenator\Options as HyphenatorOptions;
use Statamic\Modifiers\Modifier;

class Hyphenate extends Modifier
{
	/**
	 * Hyphenate a string based on:
	 * https://github.com/heiglandreas/Org_Heigl_Hyphenator.
	 *
	 * @param mixed $value The value to be modified
	 * @param array $params Any parameters used in the modifier
	 * @param array $context Contextual values
	 * @return mixed
	 */
	public function index($value, $params, $context)
	{
		$statamicsLocale = App::currentLocale();

		// Supported locales matched to its corresponding hyphenation pattern
		// https://orgheiglhyphenator.readthedocs.io/en/latest/installation/#installed-hyphenation-patterns
		$supportedLocales = [
			'de' => 'de_DE',
			'en' => 'en_GB',
			'fr' => 'fr',
		];

		$options = new HyphenatorOptions();
		$options
			->setHyphen('&shy;')
			->setDefaultLocale($supportedLocales[$statamicsLocale])
			->setRightMin(3)
			->setLeftMin(4)
			->setWordMin(8)
			->setFilters('Simple')
			->setTokenizers(['Whitespace', 'Punctuation']);

		$hyphenator = new Hyphenator();
		$hyphenator->setOptions($options);

		// Adding whitespace to work around this issue: https://github.com/heiglandreas/Org_Heigl_Hyphenator/issues/31
		$hyphenatedString = $hyphenator->hyphenate($value . ' ');

		// Remove whitespace added above
		return rtrim($hyphenatedString);
	}
}
