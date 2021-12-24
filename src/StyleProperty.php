<?php

namespace mPhpMaster\StyleAttribute;

use mPhpMaster\StyleAttribute\Traits\TMakeable;
use mPhpMaster\StyleAttribute\Traits\TStringable;

/**
 * @property ?string $name
 * @property ?string $value
 * @property array   $options
 * @property bool    $important
 */
class StyleProperty
{
    use TMakeable;
    use TStringable;

    protected array $data = [
        "name" => "",
        "value" => "",
        "important" => false,
        "options" => [],
    ];

    public function __construct(?string $name = null, ?string $value = null, array $options = [])
    {
        if ( func_num_args() === 0 ) {
            $this->name()
                ->value()
                ->options();
        } else {
            $this->name($name)
                ->value($value)
                ->options($options);
        }
    }

    /**
     * Set/Get property options.
     *
     * @param array|null $options
     *
     * @return self
     */
    public function options(array $options = []): self
    {
        $this->data['options'] = $options ?? [];
        return $this;
    }

    /**
     * Set/Get property value.
     *
     * @param string|null $value
     *
     * @return self
     */
    public function value(string $value = null): self
    {
        $this->data['value'] = $value;
        return $this;
    }

    /**
     * Set/Get property name.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function name(string $name = null): self
    {
        $this->data['name'] = $name;
        return $this;
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed|void
     */
    public function __call($name, $arguments)
    {
        $name = snake_case($name);
        if ( starts_with($name, 'get_') ) {
            $prop = str_after($name, 'get_');
            return $this->data['options'][ $prop ] ?? null;
        }

        if ( starts_with($name, 'set_') ) {
            $prop = str_after($name, 'set_');
            $this->data['options'][ $prop ] = head($arguments);
        }

        return $this;
    }

    /**
     * @param $name
     *
     * @return array|mixed
     */
    public function __get($name)
    {
        return data_get($this->data, $name);
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $name = camel_case($name);
        data_set($this->data, $name, $value);
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        return array_has($this->data, $name);
    }

    public function toString(): string
    {
        if ( is_null($this->name) || is_null($this->value) ) {
            return "";
        }

        $value = snake_case($this->name, "-");
        $value .= ": ";
        $value .= $this->value;
        $value .= $this->getImportant() ? " !important" : "";

        foreach ($this->options as $key => $option) {
            $key = snake_case($key);
            if ( $key === "test" ) {
                $value .= " {$option}";
            }
        }

        $value .= ";";

        return $value;
    }
}
