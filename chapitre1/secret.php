<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Code secret</title>
</head>

<body>
    <?php
    if (isset($_POST['code']))
    {
     if (htmlspecialchars($_POST['code']) == "kangourou")
     {
         echo "les codes d'accés sont les suivant <br>
         toto<br>
         tito<br>
         raspouting<br>";
     }
        else
        {
            echo "code d'accés incorrect";
        }
    }
    ?>
</body>

</html>
