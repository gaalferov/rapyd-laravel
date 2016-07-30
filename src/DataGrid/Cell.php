<?php namespace Iginikolaev\Rapyd\DataGrid;

use Iginikolaev\Rapyd\Helpers\HTML;

class Cell
{
    public $name = null;
    public $attributes = array();
    public $value = null;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function value($value)
    {
        $this->value = $value;

        return $this;
    }

    public function attributes($attributes, $reset = false)
    {
        if ($reset) {
            $this->attributes = $attributes;
        } else {
            $this->attributes += $attributes;
        }

        return $this;
    }

    public function style($style)
    {
        $this->attributes['style'] = $style;

        return $this;
    }

    public function buildAttributes()
    {
        if (!isset($this->attributes['class'])) {
            $this->attributes['class'] = '';
        }
        $this->attributes['class'] = 'col-'.preg_replace('~[^a-z0-9]~ui', '-', $this->name);
        
        return HTML::buildAttributes($this->attributes);
    }

    public function parseFilters($filters)
    {
        if (count($filters) < 1)
            return false;

        foreach ($filters as $filter) {
            $params = array();
            if (preg_match('/([^\[]*+)\[(.+)\]/', $filter, $match)) {
                $filter   = $match[1];
                $params = explode(',', $match[2]);
            }

            if (function_exists($filter)) {
                if ($filter == "date") {
                    array_push($params, $this->value);
                } else {
                    array_unshift($params, $this->value);
                }

                try {
                    $this->value = call_user_func_array($filter, $params);
                } catch (\Exception $e) {
                    return false;
                }

            }

        }

    }

    public function __toString()
    {
        return $this->value;
    }

}
