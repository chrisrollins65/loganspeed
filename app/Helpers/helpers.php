<?php

use League\CommonMark\Converter;

if (!function_exists('mdtrans')) {
    /**
     * Gets the Markdown conversion for a translated text
     * If $withoutWrapper = true, the surrounding '<p>' and '</p>' tags are removed
     *
     * @param string|null $key
     * @param array $replace
     * @param string|null $locale
     * @param bool|true $withoutWrapper
     * @return string
     */
    function mdtrans($key = null, $replace = [], $locale = null, $withoutWrapper = true)
    {
        /** @var Converter $converter */
        $converter = app(Converter::class);
        $converted = $converter->convertToHtml(e(trans($key, $replace, $locale)));
        // regex: https://stackoverflow.com/a/4575830/1193304
        return $withoutWrapper ? trim(preg_replace('!^<p>(.*?)</p>$!i', '$1', $converted)) : trim($converted);
    }
}

if (!function_exists('iRoute')) {
    /**
     * Generate the URL to a named route with the current/given language prefix
     *
     * @param string $name
     * @param array $parameters
     * @param bool $absolute
     * @param string $prefix
     * @return string
     */
    function iRoute($name, $parameters = [], $absolute = true, $prefix = null)
    {
        if (strlen($name) >= 3 && $name[2] == '_') {
            $name = substr($name, 3);
        }
        if (empty($name)) {
            $name = 'getHome';
        }
        if (!in_array($prefix, config('app.languages'))) {
            $prefix = app()->getLocale();
        }
        return route($prefix . '_' . $name, $parameters, $absolute);
    }
}

if (!function_exists('flaticon')) {
    /**
     * @param string $icon
     * @param array $classes
     * @param string|null $id
     * @return string
     */
    function flaticon($icon, $classes = [], $id = null)
    {
        return '<img class="flaticon ' . join(' ', $classes) . '" '
        . (is_null($id) ? '' : 'id="' . $id . '" ')
        . 'title="Icon made by Freepik from www.flaticon.com" '
        . 'alt="' . $icon . '" '
        . 'src="' . asset('img/icons/' . $icon . '.svg') . '" />';
    }
}