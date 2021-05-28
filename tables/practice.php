<?php
$table_name = "practice"
?>
<html>

<head>
    <title><?php print("${table_name}.php") ?></title>
</head>

<body>
    <table border="1">
        <tr>
            <td>user_id</td>
            <td>music_id</td>
            <td>difficulty</td>
            <td>state</td>
            <td>start_date</td>
            <td>end_date</td>
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
            print("<td>" . $row["user_id"] . "</td>");
            print("<td>" . $row["music_id"] . "</td>");
            print("<td>" . $row["difficulty"] . "</td>");
            print("<td>" . $row["state"] . "</td>");
            print("<td>" . $row["start_date"] . "</td>");
            print("<td>" . $row["end_date"] . "</td>");
            print("</tr>\n");
        }
        mysqli_free_result($res);
        ?>
    </table>
</body>

</html>
