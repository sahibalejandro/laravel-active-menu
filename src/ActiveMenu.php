<?php

namespace Sahib\ActiveMenu;

class ActiveMenu {

    /**
     * Registered keys.
     *
     * @var array
     */
    protected $keys = [];

    /**
     * Activate a menu.
     *
     * @param  string $key
     * @return void
     */
    public function activate($key)
    {
        $this->keys[] = $key;
    }

    /**
     * Checks if a menu is activated and returns the given return value.
     *
     * @param  string $key
     * @param  mixed $class
     * @return mixed
     */
    public function active($key, $return = 'active')
    {
        return in_array($key, $this->keys) ? $return : null;
    }

}

