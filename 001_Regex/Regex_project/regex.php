<?php

$errors = ['username' => '', 'telephone' => '', 'operator' => ''];

if(isset($_POST['submit'])) {
    if(empty($_POST['username'])) {
        $errors['username'] = 'Empty Username';
    }else {
        $userName = $_POST['username'];

        $regexUsername =  '/^[a-z0-9][a-z0-9_\.-]*@[a-z_]*\.[com]*$/';

        if(! preg_match($regexUsername, $userName)) {
            $errors['username'] = 'Email Is Not Valid';
        }
    }

    if(empty($_POST['telephone'])) {
        $errors['telephone'] = 'Empty Telephone';
    }else {
        $telePhone = $_POST['telephone'];

        //Creating a Regex To Recognize Iran's Landing Phone Number

        $regexTelephone = '/^0[0-9]{2}3[0-9]{7}$/';

        if(! preg_match($regexTelephone, $telePhone)) {
            $errors['telephone'] = 'Telephone Number Is Not Valid';
        }
    }

    if(empty($_POST['operator'])) {
        $errors['operator'] = 'Empty Operator';
    }else {
        $operator = $_POST['operator'];

        //Creating a Regex To Identify The Irancell Operator Number

        $regexOperator1 = '/^09(35|36|37|38|39|01|02|03|04|05)[0-9]{7}$/';

        if(! preg_match($regexOperator1, $operator)) {
            $errors['operator'] = 'Operator Number Is Not Valid';
        }
    }

    if(! array_filter($errors)) {
        // header('location:????');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'regexform.html'; ?>
</html>