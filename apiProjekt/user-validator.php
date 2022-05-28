<?php
class UserValidator
{
  private $data;
  private $success = [];
  private $errors = [];

  public function __construct($postData)
  {
    $this->data = $postData;
  }

  public function validateForm()
  {
    $this->validateUsername();
    $this->validatePassword();
    return $this->errors + $this->success;
  }
  private function validateUsername()
  {
    $value = trim($this->data['username']);
    if (empty($value)) {
      $this->addError('username', 'Användarnamnet är tomt');
    } else {
      if (strlen($value) < 5) {
        $this->addError('username', 'Användarnamnet måste innehålla minst 5 tecken');
      } else {
        $this->addSuccess('username', '✔');
      }
    }
  }
  private function validatePassword()
  {
    $value = trim($this->data['password']);
    if (empty($value)) {
      $this->addError('password', 'Lösenordet är tomt');
    } else {
      if (strlen($value) < 5) {
        $this->addError('password', 'Lösenordet måste innehålla minst 5 tecken');
      }
      if (!preg_match('/[A-Z]/', $value)) {
        $this->addError('password', 'Lösenordet måste innehålla minst en Stor bokstav');
      }
      if (!preg_match('/[a-z]/', $value)) {
        $this->addError('password', 'Lösenordet måste innehålla minst en liten bokstav');
      }
      if (!preg_match('~[0-9]+~', $value)) {
        $this->addError('password', 'Lösenordet måste innehålla minst en siffra');
      } else {
        $this->addSuccess('password', '✔');
      }
    }
  }
  private function addError($key, $value)
  {
    $this->errors[$key] = $value;
  }
  private function addSuccess($key, $value)
  {
    $this->success[$key] = $value;
  }
}
