<?php

namespace MauriceBot\Webhook;

/**
 * Application model
 *
 * @link       http://esiea.fr
 * @since      1.0.0
 *
 * @author    Tanguy Giton, Mamoun Sqalli, Vincent Scheffer
 */
class Model
{
    public function price_by_year($year_code)
    {
        switch ($year_code) {
            case '1a':
                return '1000 €';
            case '2a':
                return '2000 €';
            case '3a':
                return '3000 €';
            case '4a':
                return '4000 €';
            case '5a':
                return '5000 €';
            default:
                return null;
        }
    }
}