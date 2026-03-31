<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Link {

    public static function Build($link, $param = null) {
        if (!$param)
            $base = 'https://' . getenv('SERVER_NAME');
        else
            $base = 'https://' . getenv('SERVER_NAME');

        // If HTTP_SERVER_PORT is defined and different than default
        if (defined('HTTP_SERVER_PORT') && HTTP_SERVER_PORT != '80') {
            // Append server port
            $base .= ':' . HTTP_SERVER_PORT;
        }
        $link = $base."/".$link;
        // Escape html
        return htmlspecialchars($link, ENT_QUOTES);
    }

    public static function ToProduct($productId, $productName) {
        $link = self::CleanUrlText($productName) . '-p' . $productId . '/';
        return self::Build($link);
    }

    public static function ToCategory($categoryId, $category_name) {
        $link = self::CleanUrlText($category_name) . '-c' . $categoryId;
        return self::Build($link);
    }

    // Prepares a string to be included in an URL
    public static function CleanUrlText($string) {

        // Remove all characters that aren't a-z, 0-9, dash, underscore or space
        $not_acceptable_characters_regex = '#[^-a-zA-Z0-9_ ]#';
        $string = preg_replace($not_acceptable_characters_regex, '', $string);
        // Remove all leading and trailing spaces
        $string = trim($string);
        // Change all dashes, underscores and spaces to dashes
        $string = preg_replace('#[-_ ]+#', '-', $string);
        // Return the modified string
        return strtolower($string);
    }

}

?>