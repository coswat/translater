<?php

namespace Coswat\Translater\Tests;

use PHPUnit\Framework\TestCase;
use Coswat\Translater\Translate;

class TranslaterTest extends TestCase
{
    public $translater;

    public function setUp(): void
    {
        $this->translater = new Translate();
    }
    public function test_en_to_es(): void
    {
        // test 1
        $result = $this->translater->string('Hello')->convert('en', 'es');
        $expected = 'Hola.';
        $this->assertEquals($expected, $result);
        // test 2
        $result = $this->translater->string('This is a test by coswat translater package')->convert('en', 'es');
        $expected = 'Esta es una prueba de paquete de traducción coswat';
        $this->assertEquals($expected, $result);
    }
    public function test_en_to_ru(): void
    {
        // test 1
        $result = $this->translater->string('Hello')->convert('en', 'ru');
        $expected = 'Привет';
        $this->assertEquals($expected, $result);
        // test 2
        $result = $this->translater->string('This is a test by coswat translater package')->convert('en', 'ru');
        $expected = 'Это тест по пакету переводов coswat';
        $this->assertEquals($expected, $result);
    }
    public function test_en_to_ar(): void
    {
        // test 1
        $result = $this->translater->string('Hello')->convert('en', 'ar');
        $expected = 'مرحبا';
        $this->assertEquals($expected, $result);
        // test 2
        $result = $this->translater->string('This is a test by coswat translater package')->convert('en', 'ar');
        $expected = 'هذا اختبار من قبل حزمة ترجمه كوسوات';
        $this->assertEquals($expected, $result);
    }
    public function test_en_to_pt(): void
    {
        // test 1
        $result = $this->translater->string('Hello')->convert('en', 'pt');
        $expected = 'Olá.';
        $this->assertEquals($expected, $result);
        // test 2
        $result = $this->translater->string('This is a test by coswat translater package')->convert('en', 'pt');
        $expected = 'Este é um teste por pacote de tradutores de coswat';
        $this->assertEquals($expected, $result);
    }
    public function test_en_to_de(): void
    {
        // test 1
        $result = $this->translater->string('Hello')->convert('en', 'de');
        $expected = 'Hallo.';
        $this->assertEquals($expected, $result);
        // test 2
        $result = $this->translater->string('This is a test by coswat translater package')->convert('en', 'de');
        $expected = 'Dies ist ein Test von coswat translater Paket';
        $this->assertEquals($expected, $result);
    }
    public function test_en_to_hi(): void
    {
        // test 1
        $result = $this->translater->string('Hello')->convert('en', 'hi');
        $expected = 'नमस्ते';
        $this->assertEquals($expected, $result);
        // test 2
        $result = $this->translater->string('This is a test by coswat translater package')->convert('en', 'hi');
        $expected = 'यह कॉस्वाट ट्रांसलेटर पैकेज द्वारा एक परीक्षण है';
        $this->assertEquals($expected, $result);
    }
    public function test_en_to_fr(): void
    {
        // test 1
        $result = $this->translater->string('Hello')->convert('en', 'fr');
        $expected = 'Bonjour.';
        $this->assertEquals($expected, $result);
        // test 2
        $result = $this->translater->string('This is a test by coswat translater package')->convert('en', 'fr');
        $expected = 'C\'est un test de l\'emballage du traducteur coswat';
        $this->assertEquals($expected, $result);
    }
    public function test_en_to_it(): void
    {
        // test 1
        $result = $this->translater->string('Hello')->convert('en', 'it');
        $expected = 'Ciao.';
        $this->assertEquals($expected, $result);
        // test 2
        $result = $this->translater->string('This is a test by coswat translater package')->convert('en', 'it');
        $expected = 'Questo è un test di pacchetto traduttore';
        $this->assertEquals($expected, $result);
    }
}
