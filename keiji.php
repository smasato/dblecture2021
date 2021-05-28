<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <title>データ工学概論 - keiji</title>
</head>

<body>
  <div class="min-h-screen flex flex-col">
  <header class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
          <span class="font-semibold text-xl tracking-tight">データ工学概論</span>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div>
              <a href="./phpmyadmin" class="inline-block text-sm text-white">phpMyAdmin</a>
            </div>
          </div>
      </header>
      <div class="flex-grow p-8">
        <?php
          $mysqli = new mysqli("localhost", "s1711452", "hogehoge", "s1711452");
          $mysqli->set_charset("utf8");
          $sql = "SELECT * from keiji";
          $res = $mysqli->query($sql);
        ?>
        <table>
          <thead>
            <tr>
              <?php for($i = 0; $i< $res->field_count; $i++) :?>
              <th><?php echo $res->fetch_field_direct($i)->name;?></th>
              <?php endfor; ?>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $res->fetch_array()) :?>
            <tr>
              <?php for ($i=0; $i < $res->field_count ; $i++) :?>
              <td><?php echo $row[$i]; ?></td>
<?php endfor; ?>
            </tr>
<?php endwhile;?>
          </tbody>
        </table>
        </div>
    <footer class="bg-gray-700 p-6">
      <p class="text-white">
          <strong>TSUINS</strong>&nbsp;<span class="text-gray-500">201711452 杉山 将利</span>
      </p>
      </footer>
  </div>

</body>

</html>
