<?php

namespace mPhpMaster\StyleAttribute;

use mPhpMaster\StyleAttribute\Traits\TMakeable;
use mPhpMaster\StyleAttribute\Traits\TStringable;

/**
 *
 */
class StyleAttribute
{
    use TMakeable, TStringable;

    protected array $properties;

    public function __construct()
    {
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return $this
     */
    public function __call($name, $arguments)
    {
        $value = array_shift($arguments);
        $important = empty($arguments) ? false : array_shift($arguments);

        $this->properties[ $name ] = StyleProperty::make()
            ->name($name)
            ->value($value)
            ->setImportant($important);

        return $this;
    }

    public function toString(): string
    {
        $value = "";
        foreach ($this->properties as $name => $property) {
            $value .= ($property = $property->toString()) ? " {$property}" : "";
        }

        return ltrim($value);
    }
}
