<?php

class User {

  private $email;
  private $name;

  public function __construct($email = 'none', $name = 'none') {
    $this->email = $email;
    $this->name = $name;
  }

  public function login() {
    echo $this->name.' logged in with '.$this->email.'<br/>';
  }

  public function getProp($prop) {
    return isset($this->$prop) ? $this->$prop : 'specific prop doesn\'t exist';
  }

  public function setProp($prop, $value) {
    if (is_string($prop) && is_string($value) && strlen($value) > 0) {
      $this->$prop = $value;
      echo 'name updated'.'<br/>';
    } else {
      echo 'not a valid property'.'<br/>';
    }
  }

}

$userOne = new User('mail@net.ru', 'Leonid');

$userOne->login();
echo $userOne->getProp('name');
echo '<br/>';
$userOne->setProp('name', 'newName');
echo 'name changed on '.$userOne->getProp('name');
echo '<br/>';
echo $userOne->getProp('email');
echo '<br/>';
echo $userOne->getProp('asdfg');

?>