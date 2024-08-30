<?php

namespace MyApp\Core;

class Sanitization
{
    const FILTERS = [
        'string' => FILTER_SANITIZE_SPECIAL_CHARS,
        'string[]' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'email' => FILTER_SANITIZE_EMAIL,
        'int' => [
            'filter' => FILTER_SANITIZE_NUMBER_INT,
            'flags' => FILTER_REQUIRE_SCALAR
        ],
        'int[]' => [
            'filter' => FILTER_SANITIZE_NUMBER_INT,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'float' => [
            'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
            'flags' => FILTER_FLAG_ALLOW_FRACTION
        ],
        'float[]' => [
            'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'bool' => [
            'filter' => FILTER_VALIDATE_BOOLEAN,
            'flags' => FILTER_NULL_ON_FAILURE
        ],
        'bool[]' => [
            'filter' => FILTER_VALIDATE_BOOLEAN,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'double' => [
            'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
            'flags' => FILTER_FLAG_ALLOW_FRACTION
        ],
        'double[]' => [
            'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
            'flags' => FILTER_REQUIRE_ARRAY | FILTER_FLAG_ALLOW_FRACTION
        ],
        'url' => FILTER_SANITIZE_URL,
    ];

    private function array_trim(array $items): array
    {
        return array_map(function ($item) {
            return is_array($item) ? $this->array_trim($item) : trim($item);
        }, $items);
    }

    public function sanitize(
        array $inputs,
        array $fields = [],
        int $default_filter = FILTER_SANITIZE_SPECIAL_CHARS,
        array $filters = self::FILTERS,
        bool $trim = true
    ): array {
        if ($fields) {
            foreach ($fields as $key => $field) {
                if ($field == "string" && isset($inputs[$key])) {
                    $tempvar = strip_tags($inputs[$key]);
                    $inputs[$key] = $tempvar;
                }
            }
            $options = array_map(fn($field) => $filters[trim($field)], $fields);
            $data = filter_var_array($inputs, $options);
        } else {
            $data = filter_var_array($inputs, $default_filter);
        }

        return $trim ? $this->array_trim($data) : $data;
    }
}
