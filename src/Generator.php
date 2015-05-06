<?php
namespace Valorin\PinPusher;

use DateTime;

trait Generator
{
    /**
     * @return array
     * @throws UnknownParameterException
     */
    public function generate()
    {
        $output = [];

        foreach (get_object_vars($this) as $field) {
            $output[$field] = $this->generateValue($this->$field);
        }

        return $output;
    }

    protected function generateArray(array $values)
    {
        return array_map(function ($value) {
            return $this->generateValue($value);
        }, $values);
    }

    /**
     * @param mixed $value
     * @return mixed
     * @throws UnknownParameterException
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
