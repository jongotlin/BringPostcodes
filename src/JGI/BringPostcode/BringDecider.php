<?php

namespace JGI\BringPostcode;

class BringDecider
{
    /**
     * @param string $stringPostcode
     *
     * @return bool
     */
    public static function isBringPostcode($stringPostcode)
    {
        $code = intval(str_replace(' ', '', $stringPostcode));
        if (strlen($code) != 5) {
            throw new \InvalidArgumentException(sprintf('Postcode %s is invalid', $stringPostcode));
        }

        if (self::inRange($code, 10000, 19999)) {
            return true;
        } elseif (self::inRange($code, 10000, 19999)) {
            return true;
        } elseif (self::inRange($code, 20000, 26999)) {
            return true;
        } elseif (self::inRange($code, 40000, 44999)) {
            return true;
        } elseif (self::inRange($code, 47500, 47599)) {
            return true;
        } elseif (self::inRange($code, 62000, 62499)) {
            return true;
        } elseif (self::inRange($code, 63000, 64999)) {
            return true;
        } elseif (self::inRange($code, 70000, 76999)) {
            return true;
        }

        return false;
    }

    /**
     * @param $number
     * @param $from
     * @param $to
     *
     * @return bool
     */
    protected static function inRange($number, $from, $to)
    {
        return $number >= $from && $number <= $to;
    }
}
