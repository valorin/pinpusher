<?php
namespace Valorin\PinPusher;

use DateTime;

trait Generator
{
    /**
     * @throws UnknownParameterException
     * @return array
     *
     */
    public function generate()
    {
        $output = [];

        $fields = array_keys(get_object_vars($this));

        foreach ($fields as $field) {
            if (($value = $this->generateValue($this->$field)) !== null) {
                $output[$field] = $value;
            }
        }
        return $output;
    }

    protected function generateArray(array $values)
    {
        return array_map(function ($value) {
            return $this->generateValue($value);
        }, array_filter($values));
    }

    /**
     * @param mixed $value
     *
     * @throws UnknownParameterException
     * @return mixed
     *
     */
    protected function generateValue($value)
    {
        switch (true) {

            case is_array($value):
                return $this->generateArray($value);

            case !is_object($value):
                return $value;

            case ($value instanceof DateTime):
                return $value->format(Pin::TIME_FORMAT);

            case ($value instanceof GeneratorInterface):
                return $value->generate();
        }

        throw new UnknownParameterException();
    }
}
