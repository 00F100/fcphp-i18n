<?php

namespace FcPhp\I18n\Interfaces
{
    interface II18n
    {
        /**
         * Method to return singleton instance of i18n class
         *
         * @return FcPhp\I18n\Interfaces\II18n
         */
        public static function getInstance();

        /**
         * Method to configure database of strings do translate
         *
         * @param string $language Default language
         * @param array $configuration List of configuration
         * @return FcPhp\I18n\Interfaces\II18n
         */
        public function configure($language, array $configuration);

        /**
         * Method to translate any string and populate dynamic values
         *
         * @param string $string String to translate
         * @return string
         */
        public function translate($string);

        /**
         * Method to configure default language
         *
         * @param string $language Default language
         * @return FcPhp\I18n\Interfaces\II18n
         */
        public function lang($language);
    }
}
