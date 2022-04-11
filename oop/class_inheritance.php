<?php

class User {

  var $is_admin = false;
  var $first_name;
  var $last_name;
  var $username;

  function full_name() {
    return $this->first_name . " " . $this->last_name;
  }

}

class Customer extends User {

    var $city;
    var $state; // or province
    var $country;

    function location() {
        return $this->city . ", " . $this->state . ", " . $this->country;
    }
}

class AdminUser extends User {
    var $is_admin = true;
    function full_name() {
        return $this->first_name . " " . $this->last_name . " (Admin)";
      }
    
    }


$u = new User;
$u->first_name = 'Doaa';
$u->last_name = 'Falioun';
$u->username = 'valioun';

$c = new Customer;
$c->first_name = 'Mohammad';
$c->last_name = 'Fali';
$c->username = 'vali';
$c->city = 'New York';
$c->state = 'New York';
$c->country = 'United States';

echo $u->full_name($u) . '<br />';
echo $c->full_name($c) . '<br />';

echo $c->location() . '<br />';
// echo $u->location() . '<br />';


echo get_parent_class($u) . '<br />';
echo get_parent_class($c) . '<br />';

if(is_subclass_of($c, 'User')) {
    echo "Instance is a subclass of User.<br />";
}

$parents = class_parents($c);
echo implode(', ' , $parents) . '<br />';
?>