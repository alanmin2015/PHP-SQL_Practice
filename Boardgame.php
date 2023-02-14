<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/styles.css" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/46e62968e1.js" crossorigin="anonymous"></script>
    <title>The Recent Hottest Boardgame</title>
</head>

<body>

    <h1>The Recent Hottest Boardgame</h1>

    <?php
    $connect = mysqli_connect(
        'sql211.epizy.com',
        //host
        'epiz_33373318',
        //Username
        's55OfG4ji1TXeD',
        //Passwor
        'epiz_33373318_Boardgame' //Databse
    );

//mySQl connect error 
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    }
//SQL query select
    $query = "SELECT *
        FROM boardgame
        ORDER BY name";
    $result = mysqli_query($connect, $query)
        or die(mysqli_error($connect));

//Output the selected data query
    while ($record = mysqli_fetch_assoc($result)) {

        echo '<div class="boardgame">';
        echo '<h2>' . $record['name'] . '</h2>';
        echo '<p>
        <i class="fa-solid fa-user"></i> Player: ' . $record['Players'] .  '
                <br>';
        echo '<i class="fa-solid fa-clock"></i> Playing Time(min): ' . $record['Playing Time'] . '
                <br>';

        //Convert the 5/5 weight value to 6/6 weight value and present it by a dice
        $weight = round($record['Weight'] / 5 * 6);
        if ($weight == 1)
            (
                $dice = "one"
            );
            elseif($weight == 2)
            (
                $dice = "two"
            );
            elseif($weight == 3)
            (
                $dice = "three"
            );
            elseif($weight == 4)
            (
                $dice = "four"
            );
            elseif($weight == 5)
            (
                $dice = "five"
            );
            elseif($weight == 6)
            (
                $dice = "six"
            );
        echo '<i class="fa-solid fa-dice"></i> Weight: ' .'<i class="fa-solid fa-dice-'.$dice.'"></i> 
                <br>';

        echo '</p>';

        echo '<img src="images/' . $record['image'] . '" height="300">';
        echo '</div>';
    
    }
    ?>

</body>

</html>