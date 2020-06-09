<?php

namespace Core;

class DataHolder
{
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->_setData($data);
        }
    }

    /**
     * Nustato masyva is verciu
     * @param array $data
     */
    public function _setData(array $data): void
    {
        foreach ($data as $property_key => $value) {
            $this->__set($property_key, $value);
        }
    }

    /**
     * Grazina properciu verciu masyva
     * @return array
     */
    public function _getData(): array
    {
        $results = [];

        foreach ($this->_getPropertyKeys() as $property) {
            $results[$property] = $this->__get($property);
        }

        return $results;
    }

    /**
     * Automatiskai grazina seteri pagal property key (patikrina ar toks egzistuoja)
     * @param $property_key
     * @param $value
     */
    public function __set($property_key, $value)
    {
        if ($method = $this->_getSetterMethod($property_key)) {
            $this->{$method}($value);
        }
    }

    /**
     * Automatiskai grazina geteri pagal property key (patikrina ar toks egzistuoja)
     * @param $property_key
     * @return
     */
    public function __get($property_key)
    {
        if ($method = $this->_getGetterMethod($property_key)) {
            return $this->{$method}();
        }
    }

    /**
     * Grazina set metodo pavadinima pagal property key (patikrina ar metodas egzistuoja)
     * @param string $key
     * @return string|null
     */
    private function _getSetterMethod(string $key): ?string
    {
        $method = $this->_keyToMethod('set', $key);
        if (method_exists($this, $method)) {
            return $method;
        }

        return false;
    }

    /**
     * Grazina get metodo pavadinima pagal property key (patikrina ar metodas egzistuoja)
     * @param string $key
     * @return string|null
     */
    private function _getGetterMethod(string $key): ?string
    {
        $method = $this->_keyToMethod('get', $key);
        if (method_exists($this, $method)) {
            return $method;
        }
    }

    /**
     * Metodas paverciantis key i metoda
     * @param string $prefix
     * @param string $property_key
     * @return string
     */
    private function _keyToMethod(string $prefix, string $property_key): string
    {
        return $prefix . str_replace('_', '', $property_key);
    }

    /**
     * Generates method name to property key
     * @param string $prefix
     * @param string $method
     * @return string
     */
    private function _methodToKey(string $prefix, string $method): string
    {
        $output = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $method));
        return str_replace($prefix . '_', '', $output);
    }

    /**
     * F-ija kuri atiduoda masyva kuriame yra visi  properciu raktai kuriuos
     * galima nustatyti su aprasytais geteriais
     * @return array
     */
    private function _getPropertyKeys(): array
    {
        $keys = [];
        $class_methods = get_class_methods($this);

        foreach ($class_methods as $method) {
            if (preg_match('/^get/', $method)) {
                $keys[] = $this->_methodToKey('get', $method);
            }
        }

        return $keys;
    }
}