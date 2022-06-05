<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To do list</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1>To do list</h1>
    <form>
      <input name='task' id="taskInput" placeholder="To do..">
      <button type="button" id="addTask" class="add-task" name="submit">+</button>
    </form>
    <div id="warning-message"></div>
    <div>
    <?php
      include 'service/config.php';

      $mysqli = new mysqli ($config['DB_HOST'] , $config['DB_USERNAME'] , $config['DB_PASSWORD'], $config['DB_DATABASE']);
      $result = $mysqli->query("SELECT * FROM tasks");

      function printList($result)
      {
        while (($row = $result->fetch_assoc()) != false) {

          echo '<li id=' . $row['id']. '>
                  <span class="task">' . $row['tasks'] . '</span>
                  <button data-id=' .$row['id'] . ' class="delete-task">
                    &#x2716;
                  </button>
                </li>';
        }
      }
      echo '<ul>';
      printList($result);
      echo '</ul>';
      $mysqli->close();
      ?>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/index.js"></script>
</body>

</html>