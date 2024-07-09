<?php
    // 데이터베이스 연결 정보
    $dbHost     = "event-price.com";
    $dbUsername = "dbuser";
    $dbPassword = "asdfqwerty@1234*";
    $dbName     = "links";

    // MySQLi 객체 생성 및 데이터베이스 연결
    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // 연결 확인
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // URL의 쿼리 스트링에서 id 값 가져오기
    $workername = $_POST['workername'];
    $rater = $_POST['rater'];

    // SQL 질의문 작성
    $sql = "SELECT * FROM insainfo WHERE workername='$workername'";
    $sql2 = "SELECT * FROM insaresult WHERE workername='$workername'";

    // SQL 질의문 실행 및 결과 가져오기
    $result = $mysqli->query($sql);
    $result2 = $mysqli->query($sql2);
    // 결과가 있는 경우 첫 번째 행 가져오기
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No results";
    }
    // 데이터베이스 연결 종료
    $mysqli->close();
?>
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
    table{
        margin-left: auto;
        margin-right: auto;
    }
    th, td{
        width: 100px;
    }
    h3, h4{
        text-align: center;
    }
    h5{
        margin-bottom: 20px;
    }
    p{
        font-weight: bold;
    }
    a{
        display: inline-block;
        text-align: left;
        margin-left: 20px;
        margin-bottom: ;
    }
    textarea{
        width: 600px;
        height: 300px;
        border: 1px solid;
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

<body>
    <article class="welcome">
        <img class="bom" src="udmlogo.png" >
        <h1>2023년 하반기</br>인사평가(정성평가)</h1>
    <h2>평가대상자:<?php echo $row['workername']; ?></h2>
    <h2>평가자:<?php echo $rater; ?></h2>
    </br></br>
    <h3>모든 평가자분들께서는 공정하고 객관적인 평가를 부탁드립니다.</h3></br><h4>(평가 문항은 평가대상자에게 공유되나, 점수 기준척도는 공유되지 않습니다.)</h4>
    </br></br>
    <h5 style="color: red;">본 문서는 보안문서로서 경영진 및 인사담당자외에 어떠한 이에게도 발설 및 공유를 금지합니다.</h5>
    <!-- 여기에 더 많은 HTML 코드를 포함 -->
    <input type="button" class="check" value="시작하기" name="next" id="nextbtn" onclick='btnClick()'></input>
    </article>
    


    <article class="serv" style="display: none;">
        <img class="bom" src="udmlogo.png" >
        <h1>2023년 하반기</br>인사평가(정성평가)</h1>
    <h2>평가대상자:<?php echo $row['workername']; ?></h2>
    <h2>평가자:<?php echo $rater; ?></h2>
    </br><h4>(평가 문항은 평가대상자에게 공유되나, 점수 기준척도는 공유되지 않습니다.)</h4></br>
    <?php     if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        echo "<h2>1차 평가자의 점수 및 종합의견</h2></br><table class='tg'><thead><tr><th>평가대상자</th><th>1차평가자</th><th>전문성</th><th>전략기획</th><th>추진력</th><th>효율성</th><th>회사공헌도</th><th>동기부여</th><th>명확한 지시</th><th>지도 및 육성</th><th>팀 성과관리</th><th>부서원 케어</th></tr></thead>";
         echo "<tbody><tr>";
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
    echo "</tr></tbody></table></br>";
    echo "<textarea>".$row2['longtextt']."</textarea></br></br>";
    } ?>
        <form style="text-align: left; padding-left: 30px;" action="./adone.php" method="POST" name="usercode" autocomplete="off">
            <input type="hidden" id="workername" name="workername" value="<?php echo $workername ?>">
            <input type="hidden" id="rater" name="rater" value="<?php echo $rater ?>">
            <h1 style="margin-left: -30px;">-업무능력-</h1></br>
  <h2>전문성</h2>
  <p>업무수행에 필요한 전문지식, 경험 등을 갖추고 있으며 충분히 활용한다.</p>
  </br>
  <input type="radio" id="expertise5" name="expertise" value="5">
  <label for="expertise5">5점 : 넓고 심층적인 지식과 전문성을 가지고 있으며, 복잡한 문제를 해결하고 전략적인 결정을 내릴 수 있다.</label><br>
  <input type="radio" id="expertise4" name="expertise" value="4">
  <label for="expertise4">4점 : 전문적인 업무 지식을 보유하고 있으며, 업무 수행에 있어서 높은 수준의 이해 능력을 가지고 있다.</label><br>
  <input type="radio" id="expertise3" name="expertise" value="3">
  <label for="expertise3">3점 : 기본적인 지식을 갖추고 있고, 업무에 필요한 도구나 시스템도 잘 활용하여 업무를 수행한다.</label><br>
  <input type="radio" id="expertise2" name="expertise" value="2">
  <label for="expertise2">2점 : 업무 수행에 필요한 기본 지식이 약간 부족하거나, 업무에 필요한 도구나 시스템 사용에 어려움이 있다.</label><br>
  <input type="radio" id="expertise1" name="expertise" value="1">
  <label for="expertise1">1점 : 필요한 업무지식이 부족하여 업무 수행 시 적용 할 수 없다.</label><br>
  <input type="radio" id="expertise0" name="expertise" value="0">
  <label for="expertise0">0점 : 업무 수행에 있어서기본적인 지식을 이해하지 못한다.</label><br></br>
  <h2>전략기획</h2>
  <p>목표를 설정하고 이를 달성하기 위해 전략을 수립하는 능력이 탁월하다.</p>
  </br>
  <input type="radio" id="strategy5" name="strategy" value="5">
  <label for="strategy5">5점 : 새로운 아이디어를 도출하여 비전적인 목표와 혁신적인 계획을 수립하며, 목표를 달성하기 위한 위험 요소까지 고려해 대비책을 갖춘다.</label><br>
  <input type="radio" id="strategy4" name="strategy" value="4">
  <label for="strategy4">4점 : 전략적인 사고와 창의성을 통해 구체적이고 효과적인 목표와 계획을 수립하여 성과를 극대화하기 위해 다양한 전략을 활용한다.</label><br>
  <input type="radio" id="strategy3" name="strategy" value="3">
  <label for="strategy3">3점 : 구체적이고 현실적인 목표를 설정하며, 일정과 자원을 효율적으로 활용해 그에 맞는 전략을 수립한다.</label><br>
  <input type="radio" id="strategy2" name="strategy" value="2">
  <label for="strategy2">2점 : 일부 목표를 설정하고 계획을 세우지만, 전반적으로 실행 가능성과 효율성을 고려하지 않아 미흡한 점이 있다.</label><br>
  <input type="radio" id="strategy1" name="strategy" value="1">
  <label for="strategy1">1점 : 목표를 설정하는 데 있어서 불명확하거나 현실적으로 이루기 어려운 목표를 설정한다.</label><br>
  <input type="radio" id="strategy0" name="strategy" value="0">
  <label for="strategy0">0점 : 사업 이해도가 부족하여 목표 달성을 위한 계획을 세우지 못한다.</label><br></br>
  <h2>추진력</h2>
<p>업무가 원활히 추진되도록 리드하며, 업무상 필요한 인력과 자원을 적극적으로 개입하여 확보한다.</p>
<br>
<input type="radio" id="drive5" name="drive" value="5">
<label for="drive5">5점 : 업무를 효과적으로 계획하고 실행하는 능력으로 뛰어난 결과를 도출해 다른 구성원들에게 영향력을 행사하여 업무 추진에 긍정적인 영향을 미친다.</label><br>
<input type="radio" id="drive4" name="drive" value="4">
<label for="drive4">4점 : 업무에 적극적으로 참여하며  자발적으로 문제점을 찾고 해결하여 더 나은 결과를 도출해 낸다.</label><br>
<input type="radio" id="drive3" name="drive" value="3">
<label for="drive3">3점 : 업무에 적극적으로 참여하여 계획하고 실행해 목표 달성을 위해 노력한다.</label><br>
<input type="radio" id="drive2" name="drive" value="2">
<label for="drive2">2점 : 업무를 완수하기 위해 필요한 조치를 취하지만, 문제에 대한 대응이 느리고 제한적이다.</label><br>
<input type="radio" id="drive1" name="drive" value="1">
<label for="drive1">1점 : 업무에 소극적이며, 진취적인 조치를 취하지 않는다.</label><br>
<input type="radio" id="drive0" name="drive" value="0">
<label for="drive0">0점 : 업무의 추진력이 매우 부족하며, 업무 진행이 되질 않는다.</label><br><br>
<h2>효율성</h2>
<p>주어진 자원을 효과적으로 업무에 활용하여 빠르고 정확하게 수행한다.</p>
<br>
<input type="radio" id="efficiency5" name="efficiency" value="5">
<label for="efficiency5">5점 : 자원을 효과적으로 활용하여 업무를 효율적으로 수행하며, 프로세스를 개선하고 자동화하는 등 혁신적인 방법을 도입한다.</label><br>
<input type="radio" id="efficiency4" name="efficiency" value="4">
<label for="efficiency4">4점 : 주어진 자원을 효과적으로 활용하여 효율적인 방법으로 업무를 신속하고 정확하게 처리한다.</label><br>
<input type="radio" id="efficiency3" name="efficiency" value="3">
<label for="efficiency3">3점 : 업무를 효과적으로 수행할 수 있도록 계획하며, 자원을 활용하여 적절한 시간내에 업무를 처리한다.</label><br>
<input type="radio" id="efficiency2" name="efficiency" value="2">
<label for="efficiency2">2점 : 자원을 활용하여 업무를 처리 하려고는 하나 업무의 처리 속도가 느리다.</label><br>
<input type="radio" id="efficiency1" name="efficiency" value="1">
<label for="efficiency1">1점 : 자원을 활용하지 못하여 업무수행 시 시간과 노력을 낭비한다.</label><br>
<input type="radio" id="efficiency0" name="efficiency" value="0">
<label for="efficiency0">0점 : 업무처리 방식에 융통성이 없어 동일한 업무를 반복한다.</label><br><br>
<h2>회사공헌도</h2>
<p>회사 전체의 목표 달성과 성과 향상에 기여한다.</p>
<br>
<input type="radio" id="contribution5" name="contribution" value="5">
<label for="contribution5">5점 : 회사 전체의 목표와 가치를 깊이 이해하고, 주어진 업무 뿐만 아니라 회사의 발전을 위해 창의적인 아이디어와 노력을 기울여 회사 전체의 성과 향상에 크게 기여한다.</label><br>
<input type="radio" id="contribution4" name="contribution" value="4">
<label for="contribution4">4점 : 회사 전체의 목표와 성과 향상을 위한 노력이 높으며, 주어진 업무나 프로젝트에 적극적으로 참여하여 전체적인 성과에 긍정적인 영향을 미친다.</label><br>
<input type="radio" id="contribution3" name="contribution" value="3">
<label for="contribution3">3점 : 회사 전체의 목표와 가치에 대해 이해하고 적극적으로 참여하여, 회사의 이익과 발전에 이바지 한다.</label><br>
<input type="radio" id="contribution2" name="contribution" value="2">
<label for="contribution2">2점 : 회사 전체의 목표와 가치에 대해 이해하지만, 제한적인 영역에서만 활동하는 등 회사의 발전에 대한 관심이 부족하다.</label><br>
<input type="radio" id="contribution1" name="contribution" value="1">
<label for="contribution1">1점 : 회사 전체의 목표를 일부 이해하나 그에 기여하기 위해 노력하지 않는다.</label><br>
<input type="radio" id="contribution0" name="contribution" value="0">
<label for="contribution0">0점 : 자신의 업무 외적인 부분에 관심을 갖지 않는다.</label><br><br>
<h1 style="margin-left: -30px;">-리더십-</h1></br>
<h2>동기부여</h2>
<p>회사나 팀의 방향성과 목표를 명확하게 제시하고, 이를 이행하기 위해 부서원들에게 동기를 부여한다.</p>
<br>
<input type="radio" id="motivation5" name="motivation" value="5">
<label for="motivation5">5점 : 회사나 팀의 방향성과 목표를 명확하고 인상적으로 제시하며, 비전을 구체화하고 효과적으로 전달하여 부서원들에게 영감을 주어 팀 내의 긍정적인 분위기를 조성한다.</label><br>
<input type="radio" id="motivation4" name="motivation" value="4">
<label for="motivation4">4점 : 회사나 팀의 방향성과 목표를 명확하게 제시하고, 목표 달성을 위한 계획을 수립하여 부서원들이 적극적으로 참여하도록 동기부여 한다.</label><br>
<input type="radio" id="motivation3" name="motivation" value="3">
<label for="motivation3">3점 : 회사나 팀의 방향성과 목표를 명확하게 제시하고, 업무에 적극적으로 참여하여 부서원들에게 일정수준 동기부여 한다.</label><br>
<input type="radio" id="motivation2" name="motivation" value="2">
<label for="motivation2">2점 : 회사나 팀의 방향성과 목표를 이해하지만, 이를 전달하지 않아 부서원들의 참여를 이끌어내지 못한다.</label><br>
<input type="radio" id="motivation1" name="motivation" value="1">
<label for="motivation1">1점 : 회사나 팀의 방향성과 목표에 대한 이해가 부족하여 부서원들에게 방향성을 제공하지 못한다.</label><br>
<input type="radio" id="motivation0" name="motivation" value="0">
<label for="motivation0">0점 : 회사나 팀의 비전과 목표를 이해하려는 의욕이 없고, 부서원들의 동기를 저하시킨다.</label><br><br>
<h2>명확한 지시</h2>
<p>업무의 내용과 처리 방식을 명확하게 부서원들에게 전달하고 지시한다.</p>
<br>
<input type="radio" id="clearInstruction5" name="clearInstruction" value="5">
<label for="clearInstruction5">5점 : 업무 내용과 처리 방식을 탁월하게 부서원들에게 전달하고, 부서원별로 맞춤형 지도와 피드백을 제공하여 더 높은 수준의 결과를 이끌어낸다.</label><br>
<input type="radio" id="clearInstruction4" name="clearInstruction" value="4">
<label for="clearInstruction4">4점 : 업무의 내용과 처리 방식을 명확하게 전달하고, 필요한 정보와 지시 사항을 효과적으로 제공하여 부서원들이 원활하게 업무를 수행한다.</label><br>
<input type="radio" id="clearInstruction3" name="clearInstruction" value="3">
<label for="clearInstruction3">3점 : 구체적이고 명확한 지시를 통해 부서원들이 업무를 정확하게 이해하고 수행한다.</label><br>
<input type="radio" id="clearInstruction2" name="clearInstruction" value="2">
<label for="clearInstruction2">2점 : 일부 지시가 모호하여 부서원들이 명확하게 이해하지 못하거나 해석의 여지가 있다.</label><br>
<input type="radio" id="clearInstruction1" name="clearInstruction" value="1">
<label for="clearInstruction1">1점 : 필요한 정보나 지시 사항을 놓쳐 부서원들이 업무 처리하는데 혼란을 겪는다.</label><br>
<input type="radio" id="clearInstruction0" name="clearInstruction" value="0">
<label for="clearInstruction0">0점 : 회사나 팀의 비전과 목표를 이해하려는 의욕이 없고, 부서원들의 동기를 저하시킨다.</label><br><br>
<h2>지도 및 육성</h2>
<p>부서원들의 업무수행능력을 잘 파악하고 부서원들의 역량 개발 및 잠재력 확대를 위해 팀을 개발, 육성한다.</p>
<br>
<input type="radio" id="guidanceAndDevelopment5" name="guidanceAndDevelopment" value="5">
<label for="guidanceAndDevelopment5">5점 : 부서원들의 업무능력 향상을 위해 맞춤형 지도와 피드백을 제공하고, 개발 및 성장 기회를 극대화하여 탁월한 성과를 이루어 낸다.</label><br>
<input type="radio" id="guidanceAndDevelopment4" name="guidanceAndDevelopment" value="4">
<label for="guidanceAndDevelopment4">4점 : 부서원들의 업무능력 향상을 위해 개별적인 지도와 피드백을 제공하고, 개발 및 성장 기회를 적극적으로 제공하여 성과를 도모한다.</label><br>
<input type="radio" id="guidanceAndDevelopment3" name="guidanceAndDevelopment" value="3">
<label for="guidanceAndDevelopment3">3점 : 부서원들의 업무능력 향상을 위해 지도와 피드백을 제공하고, 개발 및 성장 기회를 주기적으로 제공한다.</label><br>
<input type="radio" id="guidanceAndDevelopment2" name="guidanceAndDevelopment" value="2">
<label for="guidanceAndDevelopment2">2점 : 부서원들의 업무능력 향상을 위해 지도와 피드백을 일부 제공하나, 개발 및 성장 기회를 충분히 제공하지 않는다.</label><br>
<input type="radio" id="guidanceAndDevelopment1" name="guidanceAndDevelopment" value="1">
<label for="guidanceAndDevelopment1">1점 : 부서원들의 업무능력 향상을 위한 지도와 피드백을 제공하지 않거나, 개발 및 성장 기회를 제공하지 않는다.</label><br>
<input type="radio" id="guidanceAndDevelopment0" name="guidanceAndDevelopment" value="0">
<label for="guidanceAndDevelopment0">0점 : 부서원들의 지도 및 역량개발에 관심이 없다.</label><br><br>
<h2>팀 성과관리</h2>
<p>부서원들과 협력하여 공동의 목표를 성공적으로 달성한다.</p>
<br>
<input type="radio" id="teamPerformanceManagement5" name="teamPerformanceManagement" value="5">
<label for="teamPerformanceManagement5">5점 : 팀 목표를 달성하기 위해 부서원들도 자발적으로 의견을 제시하는 분위기를 만들며, 적극적으로 협력해 공동의 목표를 최고 수준으로 달성한다.</label><br>
<input type="radio" id="teamPerformanceManagement4" name="teamPerformanceManagement" value="4">
<label for="teamPerformanceManagement4">4점 : 팀 목표를 달성하기 위해 부서원들과 적극적으로 협력하여 효과적인 팀워크를 구축해 공동의 목표를 대체적으로 달성한다.</label><br>
<input type="radio" id="teamPerformanceManagement3" name="teamPerformanceManagement" value="3">
<label for="teamPerformanceManagement3">3점 : 팀 목표를 달성하기 위해 부서원들과 원활하게 협력하고, 공동의 목표를 달성하기 위해 노력한다.</label><br>
<input type="radio" id="teamPerformanceManagement2" name="teamPerformanceManagement" value="2">
<label for="teamPerformanceManagement2">2점 : 팀 목표를 달성하기 위해 부서원들과 협력하여 노력하고자 하지만, 구체적인 방법을 잘 모른다.</label><br>
<input type="radio" id="teamPerformanceManagement1" name="teamPerformanceManagement" value="1">
<label for="teamPerformanceManagement1">1점 : 팀 목표에 도달하기 위한 부서원들의 업무 분담과 협력에 대한 이해가 부족하다.</label><br>
<input type="radio" id="teamPerformanceManagement0" name="teamPerformanceManagement" value="0">
<label for="teamPerformanceManagement0">0점 : 팀 목표나 성과달성에 관심 없다.</label><br><br>
<h2>부서원 케어</h2>
<p>부서원들의 필요한 지원과 도움을 제공하며 관심을 가지고 케어 한다.</p>
<br>
<input type="radio" id="staffCare5" name="staffCare" value="5">
<label for="staffCare5">5점 : 부서원들의 필요한 지원과 도움을 상시로 제공하며, 질문과 문제에 신속하게 대응해 부서원들의 성장과 만족도를 꾸준히 관리한다.</label><br>
<input type="radio" id="staffCare4" name="staffCare" value="4">
<label for="staffCare4">4점 : 부서원들을 다양한 요구와 필요에 대응하며 세심하게 이해하고, 적극적인 협력과 지원을 제공한다.</label><br>
<input type="radio" id="staffCare3" name="staffCare" value="3">
<label for="staffCare3">3점 : 부서원들을 차별 없이 대우하고, 부서원들의 다양한 요구와 필요에 일부분  협력과 지원을 제공한다.</label><br>
<input type="radio" id="staffCare2" name="staffCare" value="2">
<label for="staffCare2">2점 : 부서원들을 차별 없이 대우하지만, 부서원들의 요구와 필요에 제대로 응답하지 못한다.</label><br>
<input type="radio" id="staffCare1" name="staffCare" value="1">
<label for="staffCare1">1점 : 부서원들의 차별적인 대우, 선호, 혹은 불공정한 결정으로 인해 부서원들 사이에서 불만과 불평등이 발생한다.</label><br>
<input type="radio" id="staffCare0" name="staffCare" value="0">
<label for="staffCare0">0점 : 부서원들의 다양한 요구와 필요를 듣지 않는다.</label><br><br>
<h2>평가자 종합의견</h2>
<p>평가 점수에 대한 구체적 이유(사례) 및 종합의견을 작성해주세요. *100자 이상 필수</p>
<br>
<textarea class="workercode" type="text" placeholder="평가자 종합의견" name="longtextt" required/></textarea>
<div style="text-align: center;">
<h4>점수 및 의견은 평가대상자와 평가자에게 공유됩니다.</h4>
<input type="submit" class="check" value="완료" name="done"></input>
<h5 style="color:red;">본 문서는 보안문서로서 경영진 및 인사담당자외에 어떠한 이에게도 발설 및 공유를 금지합니다.</h5>
</div>
</form>
    </article>
<p class="expl">UDM 인사평가 페이지입니다.</p>
    <script>
    function btnClick() {
    $(".serv").css("display", "inline-block");
    $(".welcome").css("display", "none");
}
</script>
<script>
window.onload = function() {
    restoreInputs();
    setupEventListeners();
};
function saveToLocalStorage(event) {
    const workername = document.getElementById('workername').value;
    const key = workername + '-' + event.target.name;
    const value = event.target.value;
    console.log("Saving:", key, value); // 로깅을 추가하세요
    localStorage.setItem(key, value);
}

function restoreInputs() {
    const workername = document.getElementById('workername').value; // 평가 대상자 이름 가져오기
    // 모든 input 요소에 대하여
    document.querySelectorAll('input').forEach(inputElement => {
        const key = workername + '-' + inputElement.name;
        if (key) {
            const savedValue = localStorage.getItem(key); // 저장된 값을 가져옴
            console.log("Restoring:", key, savedValue);
            if (savedValue) {
                console.log("Comparing:", inputElement.value, savedValue, inputElement.value === savedValue);
                if (inputElement.type === 'radio' && inputElement.value === savedValue) {
                    console.log("체크하겠습니다:", inputElement.name, ":", inputElement.value);
                    inputElement.checked = true; // 라디오 버튼의 경우 checked 속성 설정
                }
            }
        }
    });
    // textarea 복원
    document.querySelectorAll('textarea').forEach(textareaElement => {
        const key = workername + '-' + textareaElement.name;
        if (key) {
            const savedValue = localStorage.getItem(key);
            if (savedValue) {
                textareaElement.value = savedValue;
            }
        }
    });
}

function setupEventListeners() {
    // 폼 제출 이벤트에 대한 이벤트 리스너 설정
    document.querySelector('form[name="usercode"]').addEventListener('submit', function(event) {
        // 최종 확인 메시지
        const confirmMessage = "평가를 완료하시겠습니까? 모든 입력 사항이 정확한지 확인해 주세요.";

        // confirm 함수를 사용하여 알림 창 표시
        const isConfirmed = confirm(confirmMessage);
        
        // 종합의견 텍스트에어리어 내용 길이 확인
        const commentLength = document.querySelector('textarea[name="longtextt"]').value.trim().length;
        if (commentLength < 100) {
            // 100자 미만일 경우 경고 메시지 표시
            alert('평가자 종합의견은 최소 100자 이상이어야 합니다.');
            event.preventDefault();
            return;
        }

        // 사용자가 '취소'를 선택한 경우, 폼 제출 중단
        if (!isConfirmed) {
            event.preventDefault();
        }
    });

    // 평가 항목의 입력 요소에 대해 이벤트 리스너를 추가하여, 값이 변경될 때마다 로컬 스토리지에 저장
    document.querySelectorAll('input[type=radio], textarea').forEach(inputElement => {
        inputElement.addEventListener('change', saveToLocalStorage);
    });
}
</script>

</body>