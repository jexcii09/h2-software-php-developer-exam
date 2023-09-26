<?php require("list.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chan Evasco</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <?php if(isset($_GET['message'])){ ?>
            <span class="text-danger"><?php echo $_GET['message']; ?></span>
        <?php  } ?>
   

        <form  method="post" action="result.php">
            <table class="table table-bordered mb-0">
                <thead>
                    <th>#</th>
                    <th>Question</th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    <?php foreach($questionaires as $key => $value){ ?>
                        <tr>
                            <td> <?php echo $value["question"]["no"] ?></td>
                            <td> <?php echo $value["question"]["description"] ?></td>
                            <td> <?php echo $value["answer"][0]["description"] ?></td>
                            <td> <?php echo $value["answer"][1]["description"] ?></td>
                            <td> <?php echo $value["answer"][2]["description"] ?></td>

                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" 
                                            name="opt_<?php echo $key ?>"
                                            value="<?php echo htmlentities(json_encode($value["answer"][0])) ?>">
                                        <?php echo $value["answer"][0]["option"] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" 
                                            name="opt_<?php echo $key ?>"
                                            value="<?php echo htmlentities(json_encode($value["answer"][1])) ?>">
                                        <?php echo $value["answer"][1]["option"] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" 
                                            name="opt_<?php echo $key ?>"
                                            value="<?php echo htmlentities(json_encode($value["answer"][2])) ?>">
                                        <?php echo $value["answer"][2]["option"] ?>
                                    </label>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <input type="submit" class="btn btn-success float-right mt-0" name="submit" value="Submit"/>
        </form>
                        


    </div>






    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>