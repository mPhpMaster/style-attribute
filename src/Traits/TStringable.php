<?php

namespace mPhpMaster\StyleAttribute\Traits;

/**
 * Make class as string.
 *
 * @package mPhpMaster\StyleAttribute\Traits
 */
trait TStringable
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    abstract public function toString(): string;
}
