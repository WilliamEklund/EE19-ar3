<?php
class UserValidator
{
  private $data;
  private $errors = [];
  private static $fields = ['username', 'password'];

  public function __construct($postData)
  {
    $this->data = $postData;
  }
  // public function validateForm()
  // {
  // }
  public function validateForm()
  {
    foreach (self::$fields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("$field is not defined");
        return;
      }
    }
    $this->validateUsername();
    $this->validatePassword();
    return $this->errors;
  }
  private function validateUsername()
  {
    $val = trim($this->data['username']);
    if (empty($val)) {
      $this->addError('username', 'Username must not be empty');
    } else {
      if (strlen($this->data['username']) < 5) {
        $this->addError('username', 'Username must be at least five characters');
      }
    }
  }
  private function validatePassword()
  {
    $val = trim($this->data['password']);
    if (empty($val)) {
      $this->addError('password', 'password must not be empty');
    } else {
      if (strlen($this->data['password']) < 5) {
        $this->addError('password', 'password must be at least five characters');
      }
    }
  }
  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
