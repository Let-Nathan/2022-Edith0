<?php

namespace App\Services;

use _PHPStan_a355aaa14\Nette\Utils\DateTime;

/**
 * @retrun a string representing the time passed from a given datetime to present in a user-friendly format
 */
abstract class TimeAgoModel
{
//    TODO: replace with library
    public static function getTimeAgo($dateTime): string
    {
        return $dateTime;

//        $date = new DateTime($dateTime);
//        $now = new DateTime('now');
//
//        if ($date->diff($now)->format('%y-%m-%d-%h') === '0-0-0-0') {
//            return $date->diff($now)->i . ($date->diff($now)->i > 1 ? ' minutes' : ' minute');
//        }
//
//        if ($date->diff($now)->format('%y-%m-%d') === '0-0-0') {
//            return $date->diff($now)->h . ($date->diff($now)->h > 1 ? ' hours' : ' hour');
//        }
//
//        if ($date->diff($now)->format('%y-%m') === '0-0') {
//            return $date->diff($now)->d . ($date->diff($now)->d > 1 ? ' days' : ' day');
//        }
//
//        if ($date->diff($now)->format('%y') === '0') {
//            return $date->diff($now)->m . ($date->diff($now)->m > 1 ? ' months' : ' month');
//        }
//
//        return $date->diff($now)->y . ($date->diff($now)->y > 1 ? ' years' : ' year');
    }
}
