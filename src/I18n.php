<?php

namespace FcPhp\I18n
{
	use FcPhp\I18n\Interfaces\II18n;

	class I18n implements II18n
	{
		/**
		 * Instance of i18n
		 * @var FcPhp\I18n\Interfaces\II18n
		 */
		private static $instance;

		/**
		 * Database to translate
		 * @var array
		 */
		private $configuration = [];

		/**
		 * Default language
		 * @var string
		 */
		private $language;

		/**
		 * Method to return singleton instance of i18n class
		 *
		 * @return FcPhp\I18n\Interfaces\II18n
		 */
		public static function getInstance()
		{
			if(!self::$instance instanceof II18n) {
				self::$instance = new I18n();
			}
			return self::$instance;
		}

		/**
		 * Method to configure database of strings do translate
		 *
		 * @param string $language Default language
		 * @param array $configuration List of configuration
		 * @return FcPhp\I18n\Interfaces\II18n
		 */
		public function configure($language, array $configuration)
		{
			$this->language = $language;
			$this->configuration = $configuration;
			return $this;
		}

		/**
		 * Method to configure default language
		 *
		 * @param string $language Default language
		 * @return FcPhp\I18n\Interfaces\II18n
		 */
		public function lang($language)
		{
			$this->language = $language;
			return $this;
		}

		/**
		 * Method to translate any string and populate dynamic values
		 *
		 * @param string $string String to translate
		 * @return string
		 */
		public function translate($string)
		{
			$string = $this->getString($string);
			$values = func_get_args();
			if(count($values) > 1) {
				unset($values[0]);
				$string = call_user_func_array('sprintf', array_merge([$string], $values));
			}
			return $string;
		}

		/**
		 * Method to search string in database of translate
		 *
		 * @param string $string String to translate
		 * @return string
		 */
		private function getString($string)
		{
			if(isset($this->configuration[$this->language])) {
				if(isset($this->configuration[$this->language][$string])) {
					return $this->configuration[$this->language][$string];
				}
			}
			return $string;
		}
	}
}