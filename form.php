<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $name = $age = $color = "";
    $nameError = $ageError = $colorError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameError = "Name is required";
        } else {
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (empty($_POST["age"])) {
            $ageError = "Age is required";
        } else {
            $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
        }
        if (empty($_POST["color"])) {
            $colorError = "Color is required";
        } else {
            $color = filter_input(INPUT_POST, "color", FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
    ?>
    <main class="container">
        <form class="left-side" action="form.php" method="post">
            <div class="element">
                <label for="">Name:</label>
                <input type="text" name="name">
            </div>
            <span style="color: red"><?php echo $nameError; ?></span>
            <br>
            <div class="element">
                <label for="">Age:</label>
                <input type="number" name="age">
            </div>
            <span style="color: red"><?php echo $ageError; ?></span>
            <br>
            <div class="element">
                <label for="">Favorite Color:</label>
                <select name="color">
                    <option value="">Select a color</option>
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                    <option value="purple">Purple</option>
                    <option value="yellow">Yellow</option>
                    <option value="orange">Orange</option>
                    <option value="grey">Grey</option>
                </select>
            </div>
            <span style="color: red"><?php echo $colorError; ?></span>
            <br>
            <button class="button" type="submit" name="submit">Submit</button>
        </form>
        <section class="right-side">
            <?php
            if (isset($_POST["submit"])) {
                if (empty($name) || empty($age) || empty($color)) {
                    echo " ";
                } else {
                    echo "<p class=\"name\"}>Hello, {$name}</p>";

                    if ($age < 18) {
                        echo "You are a minor. <br>";
                    } else {
                        echo "You are an adult. <br>";
                    }

                    switch ($color) {
                        case "red":
                            echo "Red is a bold choice! <br>";
                            break;

                        case "blue":
                            echo "Blue is calming";
                            break;

                        case "green":
                            echo "Green represents nature";

                        default:
                            echo "That's an interesting choice";
                    }

                    echo "<br> Here is a list of the years you have lived <br>";
                    for ($i = 1; $i <= $age; $i++) {
                        echo $i . "<br>";
                    }
                }
            } else {
                echo " ";
            }
            ?>
        </section>
    </main>
</body>

</html>