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
        $this->addKeys(explode('.', $key));
    }

    /**
     * Checks if a key is registered and returns the given return value.
     *
     * @param  string $key
     * @param  mixed $class
     * @return mixed
     */
    public function active($key, $return = 'active')
    {
        return in_array($key, $this->keys) ? $return : null;
    }

    /**
     * Get all registered keys.
     *
     * @return array
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * Register all the keys using dot notation.
     *
     * @param array $keys
     */
    protected function addKeys($keys)
    {
        while (count($keys) > 0) {
            $this->addKey(implode('.', $keys));
            array_pop($keys);
        }
    }

    /**
     * Add a key to the register.
     *
     * @param string $key
     */
    protected function addKey($key)
    {
        if (! in_array($key, $this->keys)) {
            $this->keys[] = $key;
        }
    }
}

