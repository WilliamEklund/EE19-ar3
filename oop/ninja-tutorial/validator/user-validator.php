<?php
class UserValidator
{
  private $data;
  private $errors = [];
  private static $fields = ['username', 'email'];
  public function __construct($postData)
  {
    $this->data = $postData;
  }
  // public function validateForm()
  // {
  // }
  public function validateUsername()
  {
    if (strlen($this->data['username']) < 5 || strlen($this->data['username']) > 15) {
      echo "error";
    }
  }
  public function validateEmail()
  {
    if (strlen($this->data['email']) < 5 || strlen($this->data['email']) > 15) {
      echo "error";
    }
  }
}
