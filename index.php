<?php
//Get protocol
    print_r ($_GET);
    
    $firstName =htmlspecialchars($_GET['first']);
    $lastName = htmlspecialchars($_GET['last']);
    $age = $_GET['age'];

//Sanitize data (XSS attacks)
    $firstName = filter_input(INPUT_GET, 'first', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_GET, 'last', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_STRING);

//Output message if parameters are not filled out
    if (isset($_GET["first"]) && isset($_GET["last"]) && isset($_GET["age"])) {
        $firstName = $_GET['first'];
        $lastName = $_GET['last'];
        if (!empty($firstName) && !empty($lastName) && !empty($age)) {
            echo $firstName;
            echo $lastName;
            echo $age;
        } else {
            echo "Please fill out all fields";
        }
    } else {
        echo "Not Set!!";
    }

//Today's date
    echo "</br>";
    echo date("l d.m.Y");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's Get these parameters!</title>
    <link rel="stylesheet" href="./css.css">
</head>
<body>
    <h1>WELCOME!</h1>

<div id= "form">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <label for="first">First Name</label>
        <input type="text" id ="first" name="first" autocomplete="off" >
        <label for="last">Last Name</label>
        <input type="text" id ="last" name="last" autocomplete="off" >
        <label for="age">Age</label>
        <input type="number" id ="age" name="age" autocomplete="off" >

        <div id="button">
            <button type="submit">Submit</button>
            <button type= "reset">Forgot Password?</button>
        </div>
    </form>
</div>

    <?php
    // Get info from form and fill out these sentences
    echo "Hello, my name is " . $firstName . " " . $lastName . "."; 
    echo "</br>";
    echo "I am " . $age . " years old.";
    echo "</br>";


    //Ensure that user is old enough

    if ($age < "18") {
        echo "I am not old enough to vote in the United States.";
    } else {
        echo "I am old enough to vote in the United States";
    }

    ?>
</body>
</html>