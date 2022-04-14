<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <div class="body-content">

        <div class='container'>
            <div class="row mt-5">
                <div class="col-lg-12" style="background-color:#fff; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <h1 id="ap">Our Mission</h1>
                    <br>
                    <p id='ap1'>
                        If you have any need, you must visit abcgoindia.com. If you are skilled or are working in any
                        field and do not get work, then you can get work from home connected to ABCGO INDIA (Services
                        Provider portal).<br>
                        "There is something special inside everyone, as long as it is different, it is useless, if it
                        becomes one, then you will become a force. You are requested to make your special contribution
                        to this mission, and not make this country any more."
                        - Ashutosh Kumar Verma (CEO & Founder)<br>
                        Thank you have nice day<br><br>

                        आप को कोई भी आवश्यता हो तो, अवश्य abcgoindia.com पर देखे|<br>
                        हुनरमंद है या किसी भी क्षेत्र में कार्यरत है और काम नही मिलता तो ABCGO INDIA(Services Provider
                        portal)से जुडे घर बैठे काम पाए |<br>
                        “सबके अंदर कुछ खासियत होती है जब तक अलग अलग है बेकार है एक हो जाए तो ताकत बन जाएगे आप से निवेदन
                        है कि हमारे इस मिशन में आप अपना विशेष योगदान देकर इस मिशन को, और देश को न.1 बनाये’’
                        –आशुतोष कुमार वर्मा(संस्थापक)<br>
                        धन्यवाद आपका दिन शुभ हो</p><br>

                    <br>
                    <hr>
                    <h1 id="ap">Our Registration and Certifications</h1>
                    <br>

                    <p id='ap1'>Approved By </b> Govt. of India</p>
                    <p id='ap1'>Registration No (Assessee Code)
                        <span>
                            <label id='text' style='display:inline-block;'>Click Registration No to copy</label>
                            <input style='border:none;' type="text" value="BAJPV7822BSD001" onclick='myFunc()'
                                id="myInput" readonly>
                        </span>
                    </p>

                    <p id="ap1">For online verification <a
                            href='https://cbec-easiest.gov.in/EST/AssesseeVerification.do' target="_blank">click
                            here</a></p><br>

                    <h4 id='ap'>Registration Certificate</h4>
                    <div id='body' style="width:300px;margin-left:10px;"><img src='./img/certificate.png'
                            style="width:100%;border-radius:4px;" alt='Certificate' /></div><br>
                    <br>

                    <hr>
                    <h1 id="ap">Our teams</h1><br>

                    <div class="circleimg">

                        <img src="./img/ashu.jpg" alt='CEO OF ABCGO INDIA'>


                    </div>

                    <div>
                        <a href="https://in.linkedin.com/in/ashutosh-verma-707b26145">
                            <h4 id="ap">Founder &amp; C.E.O. </h4>
                            <p id="ap1">Er. Ashutosh kr. verma</p><br>
                        </a>
                    </div>

                    <div class="circleimg">
                        <img src="./img/priyank.jpg" alt='Ads manger OF ABCGO INDIA'>
                    </div>
                    <h4 id="ap">Co-Founder &amp; Ads Manager and Meeting Officer team Increaser</h4>
                    <p id="ap1">Er. Priyanka Gupta</p><br>


                    <div class="circleimg">
                        <img src="./img/Kuldeep.jpg" alt=' Marketing and Feedback Manger OF ABCGO INDIA'>
                    </div>
                    <h4 id="ap">Co-Founder &amp; Complain Resolved Officer and Feedback Manager </h4>
                    <p id="ap1">Er. Kuldeep kushwaha</p><br>
                    <br>

                    <h4 id="ap">Co-Founder &amp; Marketing Manager and Office Manager </h4>
                    <p id="ap1">Mr. Ashish Tiwari</p><br>
                    <br>

                    <h4 id="ap">Co-Founder &amp; Business Manager and meeting Officer and team administrator</h4>
                    <p id='ap1'>Mr. Meer</p><br>

                    <h4 id='ap'>Co-Founder &amp; Account Manager and Legal advisor</h4>
                    <p id="ap1">
                        </h3>
                    <p id="ap1">Mr. Anu Verma</p><br>

                    <h4 id='ap'>Co-Founder &amp; IT chief and Technical advisor</h4>
                    <p id="ap1">Mr. S.R.</p><br>

                    <h4 id='ap'> Advisor and Absorber </h4>
                    <p id="ap1">Miss Kanak Verma (teacher)</p>
                    <p id="ap1">Mr. Aman Yadav (Business man)</p>
                    <p id="ap1">Mr. Vikky thakur (Shopkeep)</p>
                    <p id="ap1">Mr. Sandeep Junia (student)</p>
                    <p id="ap1">Mr. Shivam Gupta(L.I.C. Agent)</p>
                    <p id="ap1">Mr. Sultan Ahmed ( Photography)</p>
                    <br>
                    <h4 id="ap">Director </h4>
                    <p id='ap1'> Mrs. Neelam Verma </p><br>
                    <h4 id="ap">Invester</h4>
                    <p id='ap1'> Mr. Ganeshi (Ex. Government Employee)</p>
                    <br>
                    <h4 id="ap">Since </h4>
                    <p id='ap1'> 24-08-2016 </p><br>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>

<script>
function myFunc() {
    var copyText = document.getElementById("myInput");
    copyText.select();
    document.execCommand("copy");
    var text = document.getElementById('text');
    text.style.color = 'green';
    copyText.style.transition = "1s";
    copyText.style.color = "green";
    text.innerHTML = "Registration No Copied!";

}
</script>

<style>
#reg:hover {
    cursor: pointer;
    color: green;
    font-size: 20px;
    transition: all 0.5s;
}

.circleimg {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    overflow: hidden;
    margin-left: 10px;
}

.circleimg>img {
    width: 100%;
}

#ap {
    font-family: ubuntu;
}

#ap1 {
    font-family: ubuntu;
    padding-left: 5px;
    color: #606060;
    font-size: 16px;
}
</style>