<meta charset="UTF-8">
<?php

    $workername = $_POST['workername'];
    $password = $_POST['password'];
    $rater = $_POST['rater'];
    $dbHost     = "event-price.com";
    $dbUsername = "dbuser";
    $dbPassword = "asdfqwerty@1234*";
    $dbName     = "links";

    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // SQL injection 방지를 위해 escape 처리
    $workername = $mysqli->real_escape_string($workername);

    // SQL 질의문 작성
    $sql = "SELECT * FROM insainfo WHERE workername='$workername'";

    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No results";
    }

    $mysqli->close();

    if ($row['password']==$password) {
    ?>
    <form id="redirectForm" method="POST" action="<?php
        if ($row['sheetcase']=="조직원(사원,주임)") {
            echo 'csurvay.php';
        }
        elseif ($row['sheetcase']=="조직원(대리,과장,차장)") {
            echo 'bsurvay.php';
        }
        else{
            echo 'asurvay.php';
        }
    ?>">
        <input type="hidden" name="rater" value="<?php echo $rater; ?>">
        <input type="hidden" name="workername" value="<?php echo $workername; ?>">
    </form>
    <script type="text/javascript">
        document.getElementById('redirectForm').submit();
    </script>
    <?php
}
else{
    echo '<script type="text/javascript">'; 
    echo 'alert("패스워드 불일치!");'; 
    echo '</script>';
}
?>