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
    <?php     
if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    echo "<h2>1차 평가자의 점수 및 종합의견</h2></br><table class='tg'><thead><tr><th>평가대상자</th><th>1차평가자</th><th>전문성</th><th>업무처리능력</th><th>효율성</th><th>상황대처</th><th>성과달성</th><th>발전성</th><th>주도적</th><th>책임감</th><th>협조성</th><th>근무태도</th></tr></thead>";
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
} 
?>
        <form style="text-align: left; padding-left: 30px;" action="./bdone.php" method="POST" name="usercode" autocomplete="off">
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
   <h2>업무처리능력</h2>
    <p>주어진 업무를 효과적으로 처리하고 완수한다.</p>
    <br/>
    <input type="radio" id="efficiency5" name="efficiency" value="5">
    <label for="efficiency5">5점 : 업무 처리 과정에서 뛰어난 정확성과 효율성을 유지하며, 복잡한 업무도 탁월하게 처리한다.</label><br>
    <input type="radio" id="efficiency4" name="efficiency" value="4">
    <label for="efficiency4">4점 : 업무를 체계적으로 계획하고 효율적으로 실행하며, 신속하고 정확하게 처리한다.</label><br>
    <input type="radio" id="efficiency3" name="efficiency" value="3">
    <label for="efficiency3">3점 : 업무를 계획하고 실행하며, 정확한 시간에 맞춰 완료하고 거의 실수가 없다.</label><br>
    <input type="radio" id="efficiency2" name="efficiency" value="2">
    <label for="efficiency2">2점 : 업무를 제때에 처리하지만, 일부 업무에서 실수가 발생하거나 처리 시간이 지연되는 경우가 있다.</label><br>
    <input type="radio" id="efficiency1" name="efficiency" value="1">
    <label for="efficiency1">1점 : 업무 처리능력이 부족하여 대부분의 업무 수행 결과가 부정확하거나 계속적인 추가적 지도가 필요하다.</label><br>
    <input type="radio" id="efficiency0" name="efficiency" value="0">
    <label for="efficiency0">0점 : 업무 수행에 있어 실수가 빈번하게 발생해 업무를 완수하기 어렵다.</label><br><br/>
<h2>효율성</h2>
<p>주어진 자원을 효과적으로 업무에 활용하여 빠르고 정확하게 수행한다.</p>
<br>
<input type="radio" id="efficiency25" name="efficiency2" value="5">
<label for="efficiency25">5점 : 자원을 효과적으로 활용하여 업무를 효율적으로 수행하며, 프로세스를 개선하고 자동화하는 등 혁신적인 방법을 도입한다.</label><br>
<input type="radio" id="efficiency24" name="efficiency2" value="4">
<label for="efficiency24">4점 : 주어진 자원을 효과적으로 활용하여 효율적인 방법으로 업무를 신속하고 정확하게 처리한다.</label><br>
<input type="radio" id="efficiency23" name="efficiency2" value="3">
<label for="efficiency23">3점 : 업무를 효과적으로 수행할 수 있도록 계획하며, 자원을 활용하여 적절한 시간내에 업무를 처리한다.</label><br>
<input type="radio" id="efficiency22" name="efficiency2" value="2">
<label for="efficiency22">2점 : 자원을 활용하여 업무를 처리 하려고는 하나 업무의 처리 속도가 느리다.</label><br>
<input type="radio" id="efficiency21" name="efficiency" value="1">
<label for="efficiency21">1점 : 자원을 활용하지 못하여 업무수행 시 시간과 노력을 낭비한다.</label><br>
<input type="radio" id="efficiency20" name="efficiency2" value="0">
<label for="efficiency20">0점 : 업무처리 방식에 융통성이 없어 동일한 업무를 반복한다.</label><br><br>
<h2>상황대처</h2>
<p>어려운 상황에서 유연하게 대처하고 문제를 해결하는 능력이 뛰어나다.</p>
<br/>
<input type="radio" id="adaptability5" name="adaptability" value="5">
<label for="adaptability5">5점 : 뛰어난 판단력과 대응 능력을 발휘하여 창의적이고 혁신적인 해결책을 제시하고, 상황을 개선하며 예방해 나간다.</label><br>
<input type="radio" id="adaptability4" name="adaptability" value="4">
<label for="adaptability4">4점 : 빠른 판단력과 대응 능력을 보여주며, 문제 해결에 있어 유연한 사고와 적극적인 태도로 해결책을 제시한다.</label><br>
<input type="radio" id="adaptability3" name="adaptability" value="3">
<label for="adaptability3">3점 : 적절한 판단력과 대응 능력으로 문제를 해결하기 위해 적극적으로 노력한다.</label><br>
<input type="radio" id="adaptability2" name="adaptability" value="2">
<label for="adaptability2">2점 : 상황대처 능력이 부족하여 문제 해결에 있어 노력은 하나 대처가 미흡하다.</label><br>
<input type="radio" id="adaptability1" name="adaptability" value="1">
<label for="adaptability1">1점 : 전체적인 상황대처 능력이 부족하여 어쩔 줄 몰라 한다. </label><br>
<input type="radio" id="adaptability0" name="adaptability" value="0">
<label for="adaptability0">0점 : 중요한 업무가 뭔지, 급한 업무가 뭔지 전혀 판단하지 못한다.</label><br><br/>
<h2>성과달성</h2>
    <p>목표를 달성하고, 결과를 도출하여 회사나 팀의 성과 향상에 기여한다.</p>
    <br/>
    <input type="radio" id="achievement5" name="achievement" value="5">
    <label for="achievement5">5점 : 주어진 업무나 목표를 최고 수준의 성과로 달성하여 타인에게 영감을 주고, 지속적으로 성과를 달성하기 위해 노력한다.</label><br>
    <input type="radio" id="achievement4" name="achievement" value="4">
    <label for="achievement4">4점 : 뛰어난 업무 실력을 발휘하여 성과를 달성하고, 동료와의 협력 등을 통해 기대 이상의 성과를 달성하기도 한다.</label><br>
    <input type="radio" id="achievement3" name="achievement" value="3">
    <label for="achievement3">3점 : 주어진 업무를 효과적으로 수행하여 기대한 성과를 달성한다.</label><br>
    <input type="radio" id="achievement2" name="achievement" value="2">
    <label for="achievement2">2점 : 몇 가지 측면에서는 성과를 보이지만 전체적으로 목표한 성과를 달성하지 못한다.</label><br>
    <input type="radio" id="achievement1" name="achievement" value="1">
    <label for="achievement1">1점 : 업무 수행에 심각한 결함이 있거나 기대한 성과를 전혀 얻지 못한다.</label><br>
    <input type="radio" id="achievement0" name="achievement" value="0">
    <label for="achievement0">0점 : 목표가 뭔지 모르고, 성과 달성에 관심이 없다.</label><br><br/>
 <h2>발전성</h2>
    <p>오늘보다 더 나은 내일을 위해 노력한다.</p>
    <br/>
    <input type="radio" id="development5" name="development" value="5">
    <label for="development5">5점 : 본인의 업무도 잘 수행하며, 성장과 발전을 위해 높은 목표를 설정하여 독립적으로 노력하고 자기주도적으로 성장한다.</label><br>
    <input type="radio" id="development4" name="development" value="4">
    <label for="development4">4점 : 본인의 업무도 잘 수행하고, 성장을 위해 적절한 목표를 설정하고 학습해 점차 발전하고 있다.</label><br>
    <input type="radio" id="development3" name="development" value="3">
    <label for="development3">3점 : 본인의 업무에 대해 열심히 하고, 자기계발 활동을 수행하고 학습한다.</label><br>
    <input type="radio" id="development2" name="development" value="2">
    <label for="development2">2점 : 본인의 업무에 대해서는 열심히 하지만, 더 좋은 방법을 위한 공부는 게을리 한다.</label><br>
    <input type="radio" id="development1" name="development" value="1">
    <label for="development1">1점 : 지금 맡은 업무를 하기에도 벅차 보인다.</label><br>
    <input type="radio" id="development0" name="development" value="0">
    <label for="development0">0점 : 알고 있는 지식도 활용하지 못한다.</label><br><br/>    
<h1 style="margin-left: -30px;">-업무태도-</h1></br>
<h2>주도적</h2>
    <p>업무수행에 있어 주도적으로 참여하고 이끈다.</p>
    <br/>
    <input type="radio" id="proactive5" name="proactive" value="5">
    <label for="proactive5">5점 : 업무에 적극적으로 참여하여 주도적으로 새로운 아이디어와 방법을 제시해 다른 구성원들에게 영감과 동기부여 등 긍정적인 변화를 이끌어낸다.</label><br>
    <input type="radio" id="proactive4" name="proactive" value="4">
    <label for="proactive4">4점 : 업무에 적극적으로 참여하여 문제 해결과 의사결정을 하기 위해 주도적으로 이끌어 나간다.</label><br>
    <input type="radio" id="proactive3" name="proactive" value="3">
    <label for="proactive3">3점 : 업무에 참여하여 주도적인 역할을 수행하며, 자발적으로 먼저 의견을 제시한다.</label><br>
    <input type="radio" id="proactive2" name="proactive" value="2">
    <label for="proactive2">2점 : 업무에 참여하여 일부 주도적인 역할을 수행하지만, 일관성이 부족하거나 새로운 아이디어를 제시하지 못한다.</label><br>
    <input type="radio" id="proactive1" name="proactive" value="1">
    <label for="proactive1">1점 : 업무에 대한 적극성이 부족하고, 다른 사람에게 의존하려 한다.</label><br>
    <input type="radio" id="proactive0" name="proactive" value="0">
    <label for="proactive0">0점 : 업무가 없을 때는 아무 행동도 취하지 않고 기다린다.</label><br><br/>
<h2>책임감</h2>
    <p>성실하게 업무에 임하며, 어려운 업무일지라도 깊이 분석하여 끝까지 완수한다.</p>
    <br/>
    <input type="radio" id="responsibility5" name="responsibility" value="5">
    <label for="responsibility5">5점 : 자신의 업무에 사명감을 갖고 수행하며, 책임감이 강해 업무를 전적으로 맡길 수 있다.</label><br>
    <input type="radio" id="responsibility4" name="responsibility" value="4">
    <label for="responsibility4">4점 : 업무에 대한 책임을 지고, 문제점과 장애를 극복하고자 항상 노력하며 성실하게 업무에 임한다.</label><br>
    <input type="radio" id="responsibility3" name="responsibility" value="3">
    <label for="responsibility3">3점 : 업무에 대한 책임을 지고, 업무 수행에 충실히 임한다.</label><br>
    <input type="radio" id="responsibility2" name="responsibility" value="2">
    <label for="responsibility2">2점 : 업무 수행에 대한 책임을 일관성 있게 지지 않고 일부만 지거나, 책임을 회피하는 경향이 있다.</label><br>
    <input type="radio" id="responsibility1" name="responsibility" value="1">
    <label for="responsibility1">1점 : 주어지는 업무에 불평하거나 성의 없이 처리해 버리는 경향이 있다.</label><br>
    <input type="radio" id="responsibility0" name="responsibility" value="0">
    <label for="responsibility0">0점 : 작은 어려움에도 노력이 결여되었으며, 업무를 타인에게 전가한다.</label><br><br/>
 <h2>협조성</h2>
    <p>커뮤니케이션이 원활하고 서로를 존중하는 태도로 조화롭게 업무를 수행한다.</p>
    <br/>
    <input type="radio" id="cooperation5" name="cooperation" value="5">
    <label for="cooperation5">5점 : 상하, 동료 간에 상호 인격을 존중하고, 동료간 정보의 교환, 활용을 통해 업무의 상승효과를 이뤄낸다.</label><br>
    <input type="radio" id="cooperation4" name="cooperation" value="4">
    <label for="cooperation4">4점 : 상하, 동료 간에 상호 인격을 존중하며, 협력을 적극적으로 추구하고 다양한 의견을 수렴하고 조율하여 협업한다.</label><br>
    <input type="radio" id="cooperation3" name="cooperation" value="3">
    <label for="cooperation3">3점 : 상하, 동료 간에 대인관계가 원만하여 원활하게 협업하며 업무를 수행한다.</label><br>
    <input type="radio" id="cooperation2" name="cooperation" value="2">
    <label for="cooperation2">2점 : 상하, 동료 간에 소통은 어렵지 않지만, 협력과 협조에 제한이 있다.</label><br>
    <input type="radio" id="cooperation1" name="cooperation" value="1">
    <label for="cooperation1">1점 : 상하, 동료 간에 소통하는 데 어려움을 겪거나 의견 충돌이 발생하는 경향이 있다.</label><br>
    <input type="radio" id="cooperation0" name="cooperation" value="0">
    <label for="cooperation0">0점 : 소통하고, 협업해야 하는 업무를 혼자 처리 하려고 한다.</label><br><br/>
<h2>근무태도</h2>
    <p>회사 규율을 준수하며, 직장내 분위기를 해지지 않는다.</p>
    <br/>
    <input type="radio" id="workAttitude5" name="workAttitude" value="5">
    <label for="workAttitude5">5점 : 항상 직장규율(근태 등)을 예외 없이 정확하게 준수하며, 근무태도 및 예의범절 또한 매우 훌륭하여 부서원들 사이에서 신뢰를 받는다.</label><br>
    <input type="radio" id="workAttitude4" name="workAttitude" value="4">
    <label for="workAttitude4">4점 : 직장규율(근태 등)을 잘 지키며, 근무태도 및 예의범절이 훌륭하여 다른 사람의 모범이 된다.</label><br>
    <input type="radio" id="workAttitude3" name="workAttitude" value="3">
    <label for="workAttitude3">3점 : 대부분의 직장규율(근태 등)을 잘 지키며, 근무태도 및 예의범절도 양호하다.</label><br>
    <input type="radio" id="workAttitude2" name="workAttitude" value="2">
    <label for="workAttitude2">2점 : 직장규율(근태 등), 근무태도 및 예의범절 등 전반적으로 조금 더 노력을 기울일 필요가 있어 가끔 주의가 필요하다.</label><br>
    <input type="radio" id="workAttitude1" name="workAttitude" value="1">
    <label for="workAttitude1">1점 : 직장규율(근태 등)을 반복적으로 어기거나, 근무태도 및 예의범절이 불량하다.</label><br>
    <input type="radio" id="workAttitude0" name="workAttitude" value="0">
    <label for="workAttitude0">0점 : 직장규율(근태 등)을 무시하여 다른 구성원들에게 악영향을 미친다.</label><br><br/>
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