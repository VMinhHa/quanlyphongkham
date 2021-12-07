<?php
    function is_username($username) {
        $parttern = "/^[A-Za-z0-9_\.]{6,32}$/";
        if (preg_match($parttern, $username))
            return true;
    }

    function is_password($password) {
        $parttern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        if (preg_match($parttern, $password))
            return true;
    }

    function is_email($email) {
        $parttern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
        if (preg_match($parttern, $email))
            return true;
    }

    function is_chucai($hoten)
    {
        $parttern = "/^[a-zA-Z ]{1,1000}*$/";
        if(preg_match($parttern, $hoten))
            return true;
    }

    function is_chuso($text)
    {
        $parttern = "/^[A-Za-z0-9 .]{1,1000}*$/";
        if(preg_match($parttern, $text))
            return true;
    }

?>