<html>
<head>
    <meta charset="UTF-8">
    <title>ผลการทดสอบ</title>
    <link rel="stylesheet" href="/Asset/css/index_check.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>
<body onload="btnDownload()">
    <p id='hide-str'><?php include('/data.php')?></p>
    <button type="button" id='btnUp' onclick='topFunction()'><i class="fa-solid fa-chevron-up"></i></button>
    <button type="button" id='btnDown' onclick='downFunction()'><i class="fa-solid fa-chevron-down"></i></button>
    <div class="bg"></div>
    <section id="main-body">
        <div class="header">
            <div class="logo-header">
            <lord-icon
                src="https://cdn.lordicon.com/ckatldkn.json"
                trigger="loop"
                style="width:90px;height:90px">
            </lord-icon>
            </div>
            <div class="content-header">
                <h1>ผลการทดสอบวิชาชีพมาตรฐานและวิชาชีพครู</h1> 
                <h3>เรื่อง : วิชาชีพมาตรฐานและวิชาชีพครู</h3>
            </div>
        </div>
        <div class="content-ans">
            <?php
                $name = $_POST['user'][0];
                echo "<div class='header-info'>";
                echo "<h3>ชื่อ : ".$name."</h3>";
                echo "<h3>อีเมล : " . $_POST['user'][1]."</h3><hr>";
                echo "</div>";
                $score = 0;
                $allValue = $test;
                $pur = array(0, 0, 0, 0, 0); // (1, 2, 3, 4, 5)
                for ($i=1; $i<31; $i++) {
                    if (isset($_POST["a$i"])) {
                        echo "<p>" . $allValue[$i-1]["number"] . " " . $allValue[$i-1]["content"]. "</p>";
                        echo "คุณเลือกคำตอบ : ".$_POST["a$i"]."<br>";
                        if ($_POST["a$i"] == $allValue[$i-1]["ans"]) {
                            echo "<label id='t'>ถูกต้อง</label>"."<hr>";
                            $score++;
                            if ($i==5||$i==11||$i==12||$i==13||$i==14||$i==19) {
                                $pur[0] += 1;
                            }elseif ($i==4||$i==7||$i==26) {
                                $pur[1] += 1;
                            }elseif ($i==1||$i==15||$i==24||$i==25||$i==27||$i==30) {
                                $pur[3] += 1;
                            }elseif ($i==6||$i==10||$i==17||$i==18||$i==20||$i==21) {
                                $pur[4] += 1;
                            }else {
                                $pur[2] += 1;
                            }
                        }else {
                            echo "<label id='f'>ยังไม่ถูกต้อง</label>"."<hr>"; 
                        }
                    }else {
                        echo "<p>" . $allValue[$i-1]["number"] . " " . $allValue[$i-1]["content"]. "</p>";
                        echo "> คุณไม่ได้เลือกคำตอบ !!!";
                        echo "<hr>";
                    }
                }
                echo "<div class='footer'>";
                echo "<h2>คะแนนของคุณ : " . $score . "/30" . " คะแนน" ."</h2>";
                echo "<h2>คะแนนเฉลี่ยของคุณ : ".round((($score/30)*100), 2)." %</h2>";
                echo (round((($score/30)*100), 2) >= 70) ? ("<h2 id='t'>ยินด้วยคุณสอบผ่าน !</h2>") : ("<h2 id='f'>คุณสอบไม่ผ่าน !</h2>");
                echo "</div>";
                echo "<div class='emote'>";
                echo ((($score/30)*100) >= 70) ? (("
                    <lord-icon
                        src='https://cdn.lordicon.com/tqywkdcz.json'
                        trigger='loop'
                        style='width:150px;height:150px'>
                    </lord-icon>
                ")) : ("
                    <lord-icon
                        src='https://cdn.lordicon.com/wwneckwc.json'
                        trigger='loop'
                        delay='700'
                        style='width:150px;height:150px'>
                    </lord-icon>
                ") ;
                echo "</div>";
                echo "<div class='footer-about'>";
                echo "<li>เพื่อเข้าใจการเปลี่ยนแปลงบริบทของโลก สังคม และแนวคิดของปรัชญาของเศรษฐกิจพอเพียง<strong>&nbsp&nbsp (".round((($pur[0]/6)*20), 2)."%)</strong></li>";
                echo "<li>เพื่อเข้าใจเรื่องจิตวิทยาการศึกษา และจิตวิทยาการให้คำปรึกษาในการวิเคราะห์พัฒนาผู้เรียนตามศักยภาพ<strong>&nbsp&nbsp (".round((($pur[1]/3)*10), 2)."%)</strong></li>";
                echo "<li>เพื่อเข้าใจเรื่องหลักสูตร ศาสตร์การสอนและเทคโนโลยีดิจิทัลในการจัดการเรียนรู้<strong>&nbsp&nbsp (".round((($pur[2]/9)*30), 2)."%)</strong></li>";
                echo "<li>เพื่อเข้าใจในเรื่องการวัด ประเมินผล การเรียนรู้ และการวิจัยเพื่อแก้ปัญหาและพัฒนาผู้เรียน<strong>&nbsp&nbsp (".round((($pur[3]/6)*20))."%)</strong></li>";
                echo "<li>เพื่อเข้าใจในเรื่องการออกแบบ และการดำเนินการเกี่ยวกับงานประกันคุณภาพการศึกษา<strong>&nbsp&nbsp (".round((($pur[4]/6)*20))."%)</strong></li>";
                echo "</div>";
            ?>
            <div class="certificate" id="certificate">
                <img src="/Asset/cer.png" alt="cer.png">
                <div class="cer-content">
                    <label id="cer-name"></label>
                </div>
                <div class="cer-date">
                    <label id="cer-date"></label>
                </div>
            </div>
            <div class="box-btn-footer">
                <button type="button" id="btnDownload">ดาวน์โหลดใบรับรอง</button>
                <button onclick="btnAgain()" id="btnAgain">ทำข้อสอบอีกครั้ง</button>
            </div>
        </div>
    </section>
    <script>
        
        window.onscroll = function() {
            scrollFunction()
        };
        
        function btnDownload() {
            const a = <?php echo json_encode($score)?>;
            document.getElementById('hide-str').innerHTML = ""
            const cer = document.getElementById('certificate')
            if (((a/30)*100) >= 70) {
                const date = new Date()
                const newDate = date.toString().split(" ")
                const name = <?php echo json_encode($name)?>;
                cer.style.display = 'flex'
                document.getElementById('btnDownload').style.display = 'block'
                document.getElementById('cer-date').innerHTML = `${newDate[1]} ${newDate[2]}, ${newDate[3]}`
                document.getElementById('cer-name').innerHTML = name
            }else {
                cer.style.display = 'none'
                document.getElementById('btnDownload').style.display = 'none'
            }
        }
        document.getElementById('btnDownload').addEventListener('click', () => {
            generatePDF()
        })
        function scrollFunction() {
            const mybutton = document.getElementById('btnDown')
            const mybutton2 = document.getElementById('btnUp')
            if (document.body.scrollTop < 800) {
                mybutton.style.display = "block";
                mybutton2.style.display = "none";
            }
            if ((document.body.scrollTop > 800)){
                mybutton.style.display = "none";
                mybutton2.style.display = "block";
            }
        }
        function generatePDF() {
            var element = document.getElementById('certificate');
            element.style.width = 'auto';
            element.style.height = 'auto';
            var opt = {
                margin:       0.5,
                filename:     'certificate.pdf',
                image:        { type: 'jpeg', quality: 10 },
                html2canvas:  { scale: 1 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'landscape', precision: '25' }
            };
            html2pdf().set(opt).from(element).save();
        }
        function btnAgain() {
            location.href = "/index.html"
        }
    </script>

    <script src="/Asset/js/script.js"></script>
</body>
</html>