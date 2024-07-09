<?php
    // Database configuration
    $dbHost     = "event-price.com";
    $dbUsername = "dbuser";
    $dbPassword = "asdfqwerty@1234*";
    $dbName     = "links";
    // Create database connection
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $workername = $_POST['workername'];
        $rater = $_POST['rater'];
        $expertise = $_POST['expertise'];
        $strategy = $_POST['strategy'];
        $drive = $_POST['drive'];
        $efficiency = $_POST['efficiency'];
        $contribution = $_POST['contribution'];
        $motivation = $_POST['motivation'];
        $clearInstruction = $_POST['clearInstruction'];
        $guidanceAndDevelopment = $_POST['guidanceAndDevelopment'];
        $teamPerformanceManagement = $_POST['teamPerformanceManagement'];
        $staffCare = $_POST['staffCare'];
        $longtextt = $_POST['longtextt'];


        $sql = "SELECT * FROM insaresult WHERE workername='$workername'";
    $result = $db->query($sql);
    if ($result->num_rows > 0){
        $tatable="insaresult2";
    }
    else{
        $tatable="insaresult";
    }


        // Insert data into the database
        $query = "INSERT INTO $tatable (
            workername, 
            rater, 
            rate1, 
            rate2, 
            rate3, 
            rate4, 
            rate5, 
            rate6, 
            rate7, 
            rate8, 
            rate9, 
            rate10, 
            longtextt) 
        VALUES (
            '$workername', 
            '$rater', 
            '$expertise', 
            '$strategy', 
            '$drive', 
            '$efficiency', 
            '$contribution', 
            '$motivation', 
            '$clearInstruction', 
            '$guidanceAndDevelopment', 
            '$teamPerformanceManagement', 
            '$staffCare', 
            '$longtextt')";
        if(mysqli_query($db, $query)){
            echo '<script type="text/javascript">'; 
            echo 'alert("평가정보가 등록되었습니다.");'; 
            echo '</script>';

        } else{
            echo '<script type="text/javascript">'; 
            echo 'alert("등록에 문제가있습니다.");'; 
            echo '</script>';
        }
    }

    // Close connection
    $db->close();
?>
<!DOCTYPE html>
<html lang="ko">
<meta charset="UTF-8">
<head>
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
            width: 75vw;
            height: 13vw;
            font-size: 4vw;
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
            font-size: 12vw;
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
            width: 400px;
            height: 60px;
            font-size: 20px;
            padding-left: 20px;
            border: 1px solid #B2B2B2;
            border-radius: 20px;
        }
        .workercodes{
            margin-top: 10px;
            width: 420px;
            height: 60px;
            font-size: 20px;
            padding-left: 20px;
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
            font-size: 60px;
            line-height: 120px;
            /* identical to box height, or 100% */

            text-align: center;

            color: #000000;
        }

        article {
            margin-top: 50px;
            width: 580px;
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

<body>
    <article>
        <img class="bom" src="udmlogo.png" >
    <h2>인사평가가 완료되었습니다.</h2>
    <h3>평가에 참여해주셔서 감사합니다.</h3>
    <!-- 여기에 더 많은 HTML 코드를 포함 -->
    </article>
    <p class="expl">UDM 인사평가 페이지입니다.</p>
</body>