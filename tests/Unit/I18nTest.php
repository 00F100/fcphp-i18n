<?php
/**
 * Fast Create PHP - Dependency Injection Test
 *
 * @author João Moraes <joaomoraesbr@gmail.com>
 */
namespace FcPhp\I18n\Test\Unit
{
    use PHPUnit\Framework\TestCase;
    use FcPhp\I18n\I18n;
    use FcPhp\I18n\Interfaces\II18n;

    class I18nTest extends TestCase
    {
        public function testGetInstance()
        {
            $instance = I18n::getInstance();
            $this->assertTrue($instance instanceof II18n);
        }

        public function testConfigureLanguage()
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
            $instance = I18n::getInstance();
            $instance->configure($default, $translate);
            $name = 'João';
            $text = 'My name is %s';
            $output = $instance->translate($text, $name);
            $this->assertEquals($output, sprintf('Meu nome é %s', $name));
        }
        
        public function testTranslateSimpleText()
        {
            $text = 'Example string';
            $instance = I18n::getInstance();
            $output = $instance->translate($text);
            $this->assertEquals($text, $output);
        }

        public function testTranslateTextVariables()
        {
            $name = 'John';
            $text = 'My name is %s';
            $instance = I18n::getInstance();
            $instance->lang('en');
            $output = $instance->translate($text, $name);
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
            $instance = I18n::getInstance();
            $instance->configure($default, $translate);
            $instance->lang('es');
            $name = 'Juan';
            $text = 'My name is %s';
            $output = $instance->translate($text, $name);
            $this->assertEquals($output, sprintf('Mi nombre és %s', $name));
        }
    }
}
