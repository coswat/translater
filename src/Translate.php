<?php

/*
 * This file is part of coswat translater package
 *
 * (c) Abhishek B <abhishek.b4696@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coswat\Translater;

use GuzzleHttp\Client;
use Coswat\Translater\Exception\LangaugeNotSupported;

class Translate
{
    /**
     * string that need to be translated
     *
     * @var string
     */
    private string $string;
    /**
     * GuzzleHttp client instance
     *
     * @var Client
     */
    private ?Client $client = null;

    /**
     * API URL for translation
     */
    public const API_URL = "https://translate.argosopentech.com/translate";

    /**
     * Supported languages for translation
     */
    public const SUPPORTED_LANG = [
        'en', // English
        'es', // Spanish
        'ru', // Russian
        'ar', // Arabic
        'pt', // Portuguese
        'de', // German
        'hi', // Hindi
        'fr', // French
        'it', // Italian
        'id', // Indonesian
        'vi'  // Vietnamese
    ];

    /**
     * Translate constructor.
     */
    public function __construct()
    {
        if (is_null($this->client)) {
            $this->client = new Client();
        }
    }

    /**
     * Set the string to be translated.
     *
     * @param string $str The string to be translated.
     * @return $this
     */
    public function string(string $str): self
    {
        $this->string = trim($str);
        return $this;
    }

    /**
     * Convert the string from one language to another.
     *
     * @param string $from The source language code.
     * @param string $to The target language code.
     * @return string The translated string.
     * @throws LangaugeNotSupported When the provided language is not supported.
     */
    public function convert(string $from, string $to): string
    {
        if (!$this->langSupported($from) || !$this->langSupported($to)) {
            throw new LangaugeNotSupported("Language not supported");
        }
        return $this->translate($to, $from);
    }

    /**
     * Translate the string from one language to another.
     *
     * @param string $to The target language code.
     * @param string $from The source language code.
     * @return string The translated string.
     */
    private function translate(string $to, string $from): string
    {
        $data = [
            "q" => $this->string,
            "source" => $from,
            "target" => $to,
        ];
        $response = $this->client->request(
            "POST",
            self::API_URL,
            [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                "json" => $data,
            ]
        );
        return json_decode($response->getBody(), true)['translatedText'];
    }

    /**
     * Check if a language is supported for translation.
     *
     * @param string $lang The language code to check.
     * @return bool True if the language is supported, false otherwise.
     */
    private function langSupported(string $lang): bool
    {
        return in_array($lang, self::SUPPORTED_LANG);
    }
}
