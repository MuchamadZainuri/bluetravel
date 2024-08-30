<?php

namespace MyApp\Core;

use DateTime;

class Validation
{
    const DEFAULT_VALIDATION_ERRORS = [
        'required' => 'Data %s harus diisi.',
        'email' => '$s bukan alamat email yang valid.',
        'in' => 'Data %s tidak valid.',
        'numeric' => 'Data %s harus berupa angka.',
        'integer' => 'Data %s harus berupa bilangan bulat.',
        'float' => 'Data %s harus berupa angka desimal.',
        'array' => 'Data %s harus berupa array.',
        'boolean' => 'Data %s harus berupa boolean.',
        'url' => 'Data %s harus berupa URL.',
        'date' => 'Data %s harus berupa tanggal.',
        'date_format' => 'Data %s tidak sesuai format tanggal %s.',
        'before' => 'Data %s harus sebelum tanggal %s.',
        'after' => 'Data %s harus setelah tanggal %s.',
        'image' => 'Data %s harus berupa gambar.',
        'mimes' => 'Data %s harus berupa file dengan tipe: %s.',
        'files' => 'Data %s harus berupa file.',
        'between' => 'Data %s harus diantara %s dan %s. karakter.',
        'min_length' => 'Data %s minimal harus %s karakter.',
        'max_length' => 'Data %s maksimal harus %s karakter.',
        'regex' => 'Data %s tidak valid.',
        'unique' => 'Data %s sudah ada.',
        'different' => 'Data %s dan %s harus berbeda.',
        'match' => 'Data %s dan %s harus sama.',
        'before_or_equal' => 'Data %s harus sebelum atau sama dengan tanggal %s.',
        'after_or_equal' => 'Data %s harus setelah atau sama dengan tanggal %s.',
        'json' => 'Data %s harus berupa JSON.',
        'alphanumeric' => 'Data %s harus berupa huruf dan angka.',
        'secure' => 'Data %s harus mengandung huruf besar, huruf kecil, angka, dan karakter spesial.',
        'phone' => 'Data %s harus berupa nomor telepon yang valid.',
        'capitalize' => 'Data %s harus berupa huruf kapital.',
        'lowercase' => 'Data %s harus berupa huruf kecil.',
    ];

    public function validate(array $data, array $fields, array $messages = []): array
    {
        $split = fn($str, $sparator) => array_map('trim', explode($sparator, $str));
        $rule_messages = array_filter($messages, fn($massage) => is_string($massage));
        $validation_errors = array_merge(self::DEFAULT_VALIDATION_ERRORS, $rule_messages);
        $errors = [];
        foreach ($fields as $field => $option) {
            $rules = $split($option, '|');
            foreach ($rules as $rule) {
                $params = [];
                if (strpos($rule, ':')) {
                    [$rule_name, $param_str] = $split($rule, ':');
                    $params = $split($param_str, ',');
                } else {
                    $rule_name = trim($rule);
                }

                $fn = 'is_' . $rule_name;
                if (method_exists(new Validation(), $fn)) {
                    if ($rule_name === 'in' && is_array($params)) {
                        $params = array_map('trim', $params); 
                        $pass = $this->$fn($data, $field, $params);
                    }else{
                        $pass = $this->$fn($data, $field, ...$params);
                    }
                    if (!$pass) {
                        array_push(
                            $errors,
                            sprintf(
                                $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                                str_replace("_", " ", $field),
                                ...$params
                            )
                        );
                    }
                }
            }
        }
        return $errors;
    }

    public function is_required(array $data, string $field): bool
    {
        return isset($data[$field]) && $data[$field] !== '';
    }

    public function is_email(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return filter_var($data[$field], FILTER_VALIDATE_EMAIL);
    }

    public function is_in(array $data, string $field, array $values): bool
    {
        if (!isset($data[$field])) {
            return false;
        }

        if (!is_array($values)) {
            return false;
        }
        
        return in_array($data[$field], $values);
    }

    public function is_numeric(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return is_numeric($data[$field]);
    }

    public function is_integer(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return filter_var($data[$field], FILTER_VALIDATE_INT);
    }

    public function is_float(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return filter_var($data[$field], FILTER_VALIDATE_FLOAT);
    }

    public function is_array(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return is_array($data[$field]);
    }

    public function is_boolean(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return filter_var($data[$field], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== null;
    }

    public function is_url(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return filter_var($data[$field], FILTER_VALIDATE_URL);
    }

    public function is_date(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return strtotime($data[$field]);
    }

    public function is_date_format(array $data, string $field, string $format): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        $date = DateTime::createFromFormat($format, $data[$field]);
        return $date && $date->format($format) === $data[$field];
    }

    public function is_before(array $data, string $field, string $date): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return strtotime($data[$field]) < strtotime($date);
    }

    public function is_after(array $data, string $field, string $date): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return strtotime($data[$field]) > strtotime($date);
    }

    public function is_image(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return getimagesize($data[$field]);
    }

    public function is_mimes(array $data, string $field, array $types): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($file_info, $data[$field]);
        finfo_close($file_info);

        return in_array($mime_type, $types);
    }

    public function is_between(array $data, string $field, int $min, int $max): bool
    {
        if (!isset($data[$field])) {
            return true;
        }

        $length = mb_strlen($data[$field]);
        return $length >= $min && $length <= $max;
    }

    public function is_min_length(array $data, string $field, int $min): bool
    {
        if (!isset($data[$field])) {
            return true;
        }

        return mb_strlen($data[$field]) >= $min;
    }

    public function is_max_length(array $data, string $field, int $max): bool
    {
        if (!isset($data[$field])) {
            return true;
        }

        return mb_strlen($data[$field]) <= $max;
    }

    public function is_regex(array $data, string $field, string $pattern): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return preg_match($pattern, $data[$field]);
    }

    public function is_unique(array $data, string $field, string $table): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        $db = new Database();
        $db->setTableName($table);

        $result = $db->get([$field => $data[$field]])->get_result()->fetch_all();

        return empty($result);
    }

    public function is_different(array $data, string $field, string $field2): bool
    {
        if (!isset($data[$field]) || !isset($data[$field2])) {
            return true;
        }

        return $data[$field] !== $data[$field2];
    }

    public function is_match(array $data, string $field, string $field2): bool
    {
        if (!isset($data[$field]) || !isset($data[$field2])) {
            return true;
        }

        return $data[$field] === $data[$field2];
    }

    public function is_before_or_equal(array $data, string $field, string $date): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return strtotime($data[$field]) <= strtotime($date);
    }

    public function is_after_or_equal(array $data, string $field, string $date): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return strtotime($data[$field]) >= strtotime($date);
    }

    public function is_json(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        json_decode($data[$field]);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public function is_alphanumeric(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return ctype_alnum($data[$field]);
    }

    public function is_secure(array $data, string $field): bool
    {
        if (!isset($data[$field])) {
            return true;
        }

        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9])/';
        return preg_match($pattern, $data[$field]);
    }

    public function is_phone(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        $pattern = '/^(62|0)8[1-9][0-9]{6,11}$/';
        return preg_match($pattern, $data[$field]);
    }

    public function is_capitalize(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return ctype_upper($data[$field][0]);
    }

    public function is_lowercase(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return preg_match('/^[a-z0-9@.]+$/', $data[$field]);
    }

    public function is_files(array $data, string $field): bool
    {
        if (empty($data[$field])) {
            return true;
        }

        return is_file($data[$field]);
    }
}
