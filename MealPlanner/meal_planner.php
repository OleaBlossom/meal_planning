<?php
require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planner</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main-section">
        <div class="show-todo-section">
            <?php
            $sql = "SELECT * FROM meals";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) { ?>
                    <div class="todo-item">
                        <span id="<?php echo $row['meal_id']; ?>" class="remove-to-do">x</span>
                        <h2><?php echo $row['name'] ?></h2>
                        <br>
                        <?php if ($row['last_eaten']) { ?>
                            <small>last eaten: <?php echo $row['last_eaten'] ?></small>
                        <?php } else { ?>
                            <small>last eaten: never</small>
                        <?php } ?>
                    </div>
                <?php  } ?>
            <?php
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
</body>

</html>