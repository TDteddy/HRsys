<!DOCTYPE html>
<html lang="ko">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta property="og:image" content="open_graph1.jpg" />
    <meta property="og:locale" content="ko_KR">
    <meta property="og:image:width" content="414">
    <meta property="og:image:height" content="190">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <meta charset="UTF-8">
    <title>UDM인사평가</title>
    <link href='font/font.css' rel='stylesheet' type='text/css'>
    <style>
        * {
        margin: 0;
        padding: 0;
        border: 0;
    }

    article {}
    h3, h4{
        text-align: center;
    }
    textarea{
        width: 600px;
        height: 300px;
        border: 1px solid;
    }
    a{
        display: inline-block;
        text-align: left;
        margin-left: 20px;
        margin-bottom: ;
    }
    body {
        font-family: 'Spoqa Han Sans Neo';
        letter-spacing: -0.04em;
        text-align: center;
        background-color: #000000;
    }
    select option[value=""][disabled] {
    display: none;
    }
    body::-webkit-scrollbar {
    width: 8px;  /* 스크롤바의 너비 */
    }

    body::-webkit-scrollbar-thumb {
    height: 30%; /* 스크롤바의 길이 */
    background: #5F5F5F; /* 스크롤바의 색상 */
    
    border-radius: 10px;
    }

    body::-webkit-scrollbar-track {
    background: rgba(33, 122, 244, .1);  /*스크롤바 뒷 배경 색상*/
    }

    #btnnnn {
        cursor: pointer;
    }

    @media all and (max-width: 1000px) {
        .bom{
            margin-top: 90px;
            width: 30vw;
            height: auto;
        }
        .workercode{
            margin-top: 20px;
            width: 80vw;
            height: 20vw;
            font-size: 2vw;
            padding-left: 20px;
            border: 1px solid #B2B2B2;
            border-radius: 20px;
        }
        .workercodes{
            margin-top: 20px;
            width: 77vw;
            height: 13vw;
            font-size: 4vw;
            padding-left: 20px;
            border: 1px solid #B2B2B2;
            border-radius: 20px;
        }
        .check{
            width: 78vw;
            height: 15vw;
            background: #000000;
            border-radius: 20px;
            color: white;
            font-size: 4vw;
            margin-top: 15px;
            margin-bottom: 90px;
        }
        .expl{
            font-size: 3vw;
            margin-top: 10px;
            color: #FFD2D2;
            font-style: normal;
            margin-bottom: 10px;
        }
        h1 {
            font-style: normal;
            font-weight: 700;
            font-size: 8vw;
            line-height: 120px;
            /* identical to box height, or 100% */

            text-align: center;

            color: #000000;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        article {
            margin-top: 50px;
            width: 90vw;
            background-color: #FFFFFF;
            display: inline-block;
            border-radius: 20px;
        }



        div>div {
            font-size: 21vw;
            letter-spacing: 6vw;
            text-align: center;
            font-weight: bold;
            color: #ffffff;
        }

    }

    @media all and (min-width: 1001px) {
        .bom{
            margin-top: 50px;
            width: 150px;
            height: auto;
        }
        .workercode{
            margin-top: 10px;
            width: 1200px;
            height: 240px;
            font-size: 15px;
            padding-left: 20px;
            border: 1px solid #B2B2B2;
            border-radius: 20px;
        }
        .workercodes{
            margin-top: 10px;
            height: 60px;
            font-size: 15px;
            padding-left: 10px;
            border: 1px solid #B2B2B2;
            border-radius: 20px;
        }
        .check{
            width: 420px;
            height: 60px; 
            background: #000000;
            border-radius: 20px;
            color: white;
            font-size: 20px;
            margin-top: 15px;
            margin-bottom: 50px;
        }
        .expl{
            margin-top: 10px;
            color: #FFD2D2;
            font-style: normal;
            margin-bottom: 10px;
        }
        h1 {
            font-style: normal;
            font-weight: 700;
            font-size: 40px;
            line-height: 60px;
            margin-bottom: 20px;
            /* identical to box height, or 100% */

            text-align: center;

            color: #000000;
        }

        article {
            margin-top: 50px;
            width: 1300px;
            background-color: #FFFFFF;
            display: inline-block;
            border-radius: 20px;
        }


        div>div {
            font-size: 20vh;
            letter-spacing: 6.3vh;
            text-align: center;
            font-weight: bold;
            color: #ffffff;
        }

    }
    </style>
</head>
<?php
$password = $_POST['password'] ?? '';

if ($password === 'udmhr202312!@') {
?>
<body>
    <article>
        <img class="bom" src="udmlogo.png">
        <h1>평가결과조회</h1>
<?php
// 데이터베이스에 연결
$host = "event-price.com";
$db = "links";
$user = "dbuser";
$pass = "asdfqwerty@1234*";

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

// SQL 쿼리를 실행
$sql = "SELECT id, workername, rater, rate1, rate2, rate3, rate4, rate5, rate6, rate7, rate8, rate9, rate10, longtextt FROM insaresult";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// 결과를 가져와서 행을 순회
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "</br></br><a href='download.php?workername=".urlencode($row['workername'])."'><h2>".$row['workername']."</h2></a></br></br>";

           echo "<table class='tg'><thead><tr><th>id</th><th>피평가자</th><th>평가자</th><th>문항1</th><th>문항2</th><th>문항3</th><th>문항4</th><th>문항5</th><th>문항6</th><th>문항7</th><th>문항8</th><th>문항9</th><th>문항10</th><th>평가자의견</th></tr></thead><tbody>";
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['workername']."</td>";
    echo "<td>".$row['rater']."</td>";
    echo "<td>".$row['rate1']."</td>";
    echo "<td>".$row['rate2']."</td>";
    echo "<td>".$row['rate3']."</td>";
    echo "<td>".$row['rate4']."</td>";
    echo "<td>".$row['rate5']."</td>";
    echo "<td>".$row['rate6']."</td>";
    echo "<td>".$row['rate7']."</td>";
    echo "<td>".$row['rate8']."</td>";
    echo "<td>".$row['rate9']."</td>";
    echo "<td>".$row['rate10']."</td>";
    echo "<td id='textarea1'>".nl2br($row['longtextt'])."</td>";
    echo "</tr>";
    
    $sql2 = "SELECT id, workername, rater, rate1, rate2, rate3, rate4, rate5, rate6, rate7, rate8, rate9, rate10, longtextt FROM insaresult2 WHERE workername=?";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute([$row['workername']]);

    if ($stmt2->rowCount() > 0) {
        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        echo "<tr>";
    echo "<td>".$row2['id']."</td>";
    echo "<td>".$row2['workername']."</td>";
    echo "<td>".$row2['rater']."</td>";
    echo "<td>".$row2['rate1']."</td>";
    echo "<td>".$row2['rate2']."</td>";
    echo "<td>".$row2['rate3']."</td>";
    echo "<td>".$row2['rate4']."</td>";
    echo "<td>".$row2['rate5']."</td>";
    echo "<td>".$row2['rate6']."</td>";
    echo "<td>".$row2['rate7']."</td>";
    echo "<td>".$row2['rate8']."</td>";
    echo "<td>".$row2['rate9']."</td>";
    echo "<td>".$row2['rate10']."</td>";
    echo "<td id='textarea2'>".nl2br($row2['longtextt'])."</td>";
    echo "</tr>";
    }
    echo "</tbody></table>";
}?>
    </article>
    <p class="expl">UDM인사평가 결과 페이지입니다.</p>
</body>
<?php
} else {
?>
<form method="POST">
    <input type="password" name="password" required>
    <input type="submit" value="Submit">
</form>
<?php
}
?>