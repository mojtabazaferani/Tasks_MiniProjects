<?php

class SMS
{
    public $username;

    public $password;

    public $senderNumber;

    public $recieverNumber;

    public $note;

    public $name;

    static function sendMessage($username, $password, $senderNumber, $recieverNumber, $name)
    {

        $sms = new SMS();

        $sms->username = $username;

        $sms->password = $password;

        $sms->senderNumber = $senderNumber;

        $sms->recieverNumber = $recieverNumber;

        $sms->name = $name;

        $msg = 'Welcome ' . $sms->name . ' To Website لغو11';

        $sms->note = $msg;

        $url = 'http://sms20.ir/send_via_get/send_sms.php?username='. $sms->username . '&password='. $sms->password . '&sender_number='. $sms->senderNumber . '&receiver_number='. $sms->recieverNumber . '&note='. $sms->note;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        $result = curl_exec($ch);

        return $result;

    }
}

$name = $number = '';

$errors = ['name' => '', 'number' => ''];

if(isset($_POST['submit'])) {

    if(empty($_POST['name'])) {
        $errors['name'] = 'Name Field Is Required!!';
    }else {
        $name = $_POST['name'];
    }

    if(empty($_POST['number'])) {
        $errors['number'] = 'Number Field Is Required!!';
    }else {

        //irancell
        $regexOperator1 = '/^09(35|36|37|38|39|01|02|03|04|05)[0-9]{7}$/';

        //hamrah-aval
        $regexOperator2 = '/^09(10|11|12|13|14|15|16|17|18|19|91|90|92|93)[0-9]{7}$/';

        //rightel
        $regexOperator3 = '/^09(21|22|23)[0-9]{7}$/';

        if(!preg_match($regexOperator1, $_POST['number']) && !preg_match($regexOperator2, $_POST['number']) && !preg_match($regexOperator3, $_POST['number'])) {
            $errors['number'] = 'The Number Is Not Valid!!';
        }else {
            $number = $_POST['number'];
        }
    }

    if(! array_filter($errors)) {
        $successfully = 'Successful';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="logo-name">Mojtaba</h1>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </nav>
        </div>
        <div class="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>
    <header class="h4">
        <h2>Hello</h2>
    </header>
    <br>
    <br>
    <br>
    <br>
    <h2 class="text">Client-Page</h2>
    <br>
    <br>
    <form action="#" method="post" class="form">
        <h3>Register</h3>
        <br>
        <label for="name">Your Name :</label>
        <input type="text" name="name" id="name" placeholder="What's Your Name?" class="input">
        <div class="error"> <?php echo $errors['name']; ?> </div>
        <br>

        <label for="number">Your Number :</label>
        <input type="text" name="number" id="number" placeholder="Please Insert Number!?" class="input">
        <div class="error"> <?php echo $errors['number']; ?> </div>
        <br>

        <button type="submit" class="sub" name="submit">Send</button>
        <div class="successful"> <?php echo $successfully; ?> </div>
    </form>
</body>
</html>