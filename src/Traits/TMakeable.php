<?php

namespace mPhpMaster\StyleAttribute\Traits;

/**
 * Add make method to class.
 *
 * @package mPhpMaster\StyleAttribute\Traits
 */
trait TMakeable
{
    /**
     * Create a new instance.
     *
     * @return static
     */
    public static function make(...$arguments)
    {
        return new static(...$arguments);
    }
}
