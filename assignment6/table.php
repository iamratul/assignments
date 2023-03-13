<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User List</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
  <style>
    body {
      margin-top: 30px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>User List</h2>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Profile Picture</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $csv_file = 'users.csv';
        if (file_exists($csv_file)) {
          $fp = fopen($csv_file, 'r');
          fgetcsv($fp);
          while ($data = fgetcsv($fp)) {
            echo '<tr>';
            echo '<td>' . $data[0] . '</td>';
            echo '<td>' . $data[1] . '</td>';
            echo '<td><img src="uploads/' . $data[2] . '" height="50"></td>';
            echo '</tr>';
          }
          fclose($fp);
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>