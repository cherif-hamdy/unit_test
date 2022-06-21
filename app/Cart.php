<?php

namespace App;

class Cart
{
    public $items = [];

    public function insert($item)
    {
        $this->items[] = $item;
    }

    public function count()
    {
        return count($this->items);
    }
}