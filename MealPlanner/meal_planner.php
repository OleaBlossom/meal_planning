<?php
require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="jumbotron">
        <h1 class="display-4">Meal Choosing Helper</h1>
        <p class="lead">Scroll through the options, checking the meals you'd like to eat this week.</p>
        <hr class="my-4">
        <p>When you're ready, click the submit button to recieve a list of ingredients.</p>
    </div>
    <div>
        <form action="get_meal_list.php" method="post">
            <button type="submit" class="btn btn-primary">Submit</button>
            <br>
            <br>
            <?php
            $sql = "SELECT * FROM meals";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) { ?>
                    <div class="card bg-light">
                        <div class="row">
                            <div class="card-header col-1 border"><input type="checkbox" id="meal"></div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                <p class="card-text"><?php if ($row['category']) { ?>
                                        Type of meal: <?php echo $row['category'] ?>
                                    <?php } else { ?>
                                    <?php } ?></p>
                            </div>
                            <div class="card-body col-12 border">
                                <p>
                                    <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#meal_<?php echo $row['meal_id'] ?>" aria-expanded="false" aria-controls="collapseExample">
                                        Ingredients
                                    </button>
                                </p>
                                <div class="collapse" id="meal_<?php echo $row['meal_id'] ?>">
                                    <div class="card card-body">
                                        <ul>
                                            <li>One Ingredient</li>
                                            <li>Another Thing</li>
                                            <li>Something Else</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <?php if ($row['last_eaten']) { ?>
                                        last eaten: <?php echo $row['last_eaten'] ?>
                                    <?php } else { ?>
                                        last eaten: never
                                    <?php } ?></p>
                                </div>
                            </div>
                            <br>
                        </div>
                    <?php  } ?>
                <?php
            } else {
                echo "0 results";
            }
            $conn->close();
                ?>
        </form>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!--         <script src="/meal_planning/MealPlanner/js/myscripts.js"></script> -->
</body>

</html>