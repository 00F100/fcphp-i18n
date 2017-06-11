<?php

use FcPhp\I18n\I18n;

/**
 * Function to translate any string and populate dynamic values
 *
 * @param string $string String to translate
 * @return string
 */
function __($string)
{
	$instance = I18n::getInstance();
	return call_user_func_array([$instance, 'translate'], func_get_args());
}

/**
 * Function to configure database of strings do translate
 *
 * @param string $language Default language
 * @param array $configuration List of configuration
 * @return FcPhp\I18n\Interfaces\II18n
 */
function __i18n_configure($language, array $configuration)
{
	$instance = I18n::getInstance();
	return $instance->configure($language, $configuration);
}

/**
 * Function to configure default language
 *
 * @param string $language Default language
 * @return FcPhp\I18n\Interfaces\II18n
 */
function __i18n_lang($language)
{
	$instance = I18n::getInstance();
	return $instance->lang($language);
}