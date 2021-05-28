<?php
$table_name = "music"
?>
<html>

<head>
    <title><?php print("${table_name}.php") ?></title>
</head>

<body>
    <table border="1">
        <tr>
            <td>id</td>
            <td>isbn</td>
            <td>name</td>
        </tr>
        <?php
        $host = "localhost";
        if (!$conn = mysqli_connect($host, "s1711452", "hogehoge")) {
            die("MySQL接続エラー.<br />");
        }
        mysqli_select_db($conn, "s1711452");
        $sql = "SELECT * FROM ${table_name}";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($res)) {
            print("<tr>");
            print("<td>" . $row["id"] . "</td>");
            print("<td>" . $row["isbn"] . "</td>");
            print("<td>" . $row["name"] . "</td>");
            print("</tr>\n");
        }
        mysqli_free_result($res);
        ?>
    </table>
</body>

</html
