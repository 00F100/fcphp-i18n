<?php
/**
 * Fast Create PHP - Dependency Injection Test
 *
 * @author João Moraes <joaomoraesbr@gmail.com>
 */
namespace FcPhp\I18n\Test\Unit
{
    use PHPUnit\Framework\TestCase;

    class FunctionsTest extends TestCase
    {
        public function testConfigureLanguageDefault()
        {
            $default = 'pt-br';
            $translate = [
                'pt-br' => [
                    'My name is %s' => 'Meu nome é %s',
                ],
                'en' => [
                    'My name is %s' => 'My name is %s',
                ],
                'es' => [
                    'My name is %s' => 'Mi nombre és %s',
                ],
            ];
            __i18n_configure($default, $translate);
            $name = 'João';
            $text = 'My name is %s';
            $output = _i18n_translate($text, $name);
            $this->assertEquals($output, sprintf('Meu nome é %s', $name));
        }
        
        public function testTranslateSimpleText()
        {
            $text = 'Example string';
            $output = __($text);
            $this->assertEquals($text, $output);
        }

        public function testTranslateTextVariables()
        {
            $name = 'John';
            $text = 'My name is %s';
            __i18n_lang('en');
            $output = __($text, $name);
            $this->assertEquals(sprintf($text, $name), $output);
        }

        public function testChangeLanguageDefault()
        {
            $default = 'pt-br';
            $translate = [
                'pt-br' => [
                    'My name is %s' => 'Meu nome é %s',
                ],
                'en' => [
                    'My name is %s' => 'My name is %s',
                ],
                'es' => [
                    'My name is %s' => 'Mi nombre és %s',
                ],
            ];
            __i18n_configure($default, $translate);
            __i18n_lang('es');
            $name = 'Juan';
            $text = 'My name is %s';
            $output = __($text, $name);
            $this->assertEquals($output, sprintf('Mi nombre és %s', $name));
        }
    }
}
