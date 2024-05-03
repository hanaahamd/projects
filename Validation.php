<?php

require_once __DIR__ . '/Database.php';

class Validation
{

    public $error;

    public function requiredValidation($name, $string): bool
    {
        $validate = strlen($string) > 0;

        if (!$validate) {
            $this->error = 'The Felid ' . $name . ' is required.';
        }

        return $validate;
    }

    public function maxValidation($name, $string, $len)
    {
        $validate = strlen($string) > $len;

        if (!$validate) {
            $this->error = 'The Felid ' . $name . ' must be attest ' . $len . ' chars.';
        }

        return $validate;
    }

    public function existsValidate($tableName, $columnName, $value)
    {
        $db = new Database();

        $sql = 'SELECT * FROM ' . $tableName . ' WHERE ' . $columnName . ' = ' . $value;
        // $sql = ''; // create it with count as a bonus.

        $response = $db->makeQuery($sql);

        $result =  $response->fetch_all(MYSQLI_ASSOC);

        $validate = count($result);

        if (!$validate) {
            $this->error = 'The Felid ' . $columnName . ' not exists.';
        }

        return $validate;
    }

    public function minValidation($name, $string, $len)
    {
        $validate = strlen($string) <= $len;

        if (!$validate) {
            $this->error = 'The Felid ' . $name . ' must be greater than ' . $len . ' chars.';
        }

        return $validate;
    }

    public static function betweenValidation($string, $max, $min)
    {
        // return self::maxValidation($string, $max) && self::minValidation($string, $min);
    }

    public static function integerValidation($value)
    {
        return is_integer($value);
    }
}

// self vs static 
