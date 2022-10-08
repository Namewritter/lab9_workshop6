<?php include "connect.php" ?>

<html>
    <head>
        <meta charset="utf-8">
        <script>
            function confirmDelete(username)
            {
                var ans = confirm("ต้องการลบรายชื่อนี้" + username)
                if (ans == true)
                {
                    document.location = "delete.php?username=" + username ;
                }
            }
        </script>
    </head>
    <body>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member");
            $stmt->execute();
        ?>
        <?php while ($row = $stmt->fetch()) : ?>
            ชื่อสมาชิก: <?=$row ["name"]?><br>
            ที่อยู่: <?=$row ["address"]?><br>
            อีเมล์:  <?=$row ["email"]?><br>
            <img src='member_photo/<?=$row["username"]?>.jpg' width='100'><br>
            <?php
                echo "<a href='editform.php?username=" . $row["username"] . "'>แก้ไข</a> | ";
                echo "<a href='delete.php?username=" . $row["username"] . " 'onclick='confirmDelete(" . $row["username"] . ")' >ลบ</a> | ";
                echo "<br><br>\n";
            ?>
        <div>
            <?php endwhile; ?>
        </div>
    </body>
</html>
