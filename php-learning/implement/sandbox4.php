<?php
    // class

    class User{
        private $name;
        private $email;

        public function __construct($name, $email){
            $this->name = $name;
            $this->email = $email;
        }

        public function login(){
            echo $this->name . ' logged in.<br />';
            echo $this->email . '<br />';
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            if (is_string($name) && strlen($name)>1){
                $this->name = $name;
                return "name has been updated to $name." . '<br />';
            }
            else{
                return 'not a valid name. <br />';
            }
        }
    }

    $user1 = new User('Eric', 'eric@gmail.com');
    $user2 = new User('Hello', 'hello@gmail.com');

    echo $user1->setName('Mario');
    $user1->login();
    $user2->login();
?>