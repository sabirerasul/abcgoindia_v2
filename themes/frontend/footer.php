<!-- <div class="b-example-divider"></div> -->
<footer class="pt-3">
<!-- <div class="container-fluid bg-white"> -->
  <div class="container">
    <div class="row">
      <div class="footer-contact col-3">
        <h5>CONTACT US</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="https://www.google.co.in/maps/place/ABCGO+INDIA,+Panhauna,+Uttar+Pradesh+229135/@26.4759557,81.4615913,17z/data=!4m2!3m1!1s0x399bb45ca6102257:0xd3c9e62b59133962?hl=en" target="_blank" class="nav-link p-0 text-muted"><i class="fas fa-map-marker-alt"></i> Head Office :House No: 456/31 Bhikharipur, Panhuana, Amethi, Uttar Prdesh, India-229135</a></li>
            <li class="nav-item mb-2"><a href="tel:+91-980-7559-692" class="nav-link p-0 text-muted"><i class="fas fa-phone"></i>+91-980-7559-692</a></li>
            <li class="nav-item mb-2"><a href="mailto:support@abcgoindia.com" class="nav-link p-0 text-muted"><i class="fas fa-envelope"></i>support@abcgoindia.com</a></li>
            <li class="nav-item mb-2"><a href="https://www.abcgoindia.com" target="_blank" class="nav-link p-0 text-muted"><i class="fas fa-globe"></i>www.abcgoindia.com</a></li>
            <li class="nav-item mb-2"><a href="https://www.abcgoindia.com/contact.php" target="_blank" class="nav-link p-0 text-muted"><i class="fas fa-user"></i>Contact Us</a></li>
        </ul>
      </div>

      <div class="footer-quicklink col-3">
        <h5>QUICK LINK</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="<?=Yii::getAlias('@web')?>/e-market" class="nav-link p-0 text-muted">E-Market</a></li>
            <!--<li class="nav-item mb-2"><a href="../application/" class="nav-link p-0 text-muted">Web Apps</a></li>-->
            <li class="nav-item mb-2"><a href="<?=Yii::getAlias('@web')?>/why-join" class="nav-link p-0 text-muted">Why Join</a></li>
            <li class="nav-item mb-2"><a href="<?=Yii::getAlias('@web')?>/about" class="nav-link p-0 text-muted">About us</a></li>
            <li class="nav-item mb-2"><a href="https://blog.abcgoindia.com" class="nav-link p-0 text-muted">Help Center</a></li>
            <li class="nav-item mb-2"><a href="<?=Yii::getAlias('@web')?>/register" class="nav-link p-0 text-muted">Register</a></li>
            <li class="nav-item mb-2"><a href="<?=Yii::getAlias('@web')?>/login" class="nav-link p-0 text-muted">Log In</a></li>
        </ul>
      </div>

      <!--<div class="footer-services col-3">
        <h5>OUR SERVICES</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="../promote/" class="nav-link p-0 text-muted">Create Ads</a></li>
            <li class="nav-item mb-2"><a href="../business/add_items.php" class="nav-link p-0 text-muted">Add Items/Services</a></li>
            <li class="nav-item mb-2"><a href="../promote/business.php" class="nav-link p-0 text-muted">Promote Business</a></li>
            <li class="nav-item mb-2"><a href="../promote/items.php" class="nav-link p-0 text-muted">Promote Items/Services</a></li>
        </ul>
      </div>-->

      <div class="footer-terms col-3">
        <h5>OUR TERM&apos;S AND POLICY</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="<?=Yii::getAlias('@web')?>/terms-policy/terms" target="_blank" class="nav-link p-0 text-muted">Term&apos;s and Conditions</a></li>
            <li class="nav-item mb-2"><a href="<?=Yii::getAlias('@web')?>/terms-policy/policy" target="_blank" class="nav-link p-0 text-muted">Privacy and Policy</a></li>
        </ul>
      </div>
    </div>

    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>© 2016 - <?= date('Y') ?> ABCGO INDIA, All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="https://www.facebook.com/ABCGO-INDIA-1833384700211819/" target="_blank" style="font-size:25px;color:#1877f2;margin:5px;"><i class="fab fa-facebook"></i></a></li>
        <li class="ms-3"><a class="link-dark" href="https://twitter.com/abcgo_india" target="_blank" style="font-size:25px;color:#1da1f2;margin:5px;"><i class="fab fa-twitter"></i></a></li>
        <li class="ms-3"><a class="link-dark" href="https://in.linkedin.com/in/ashutosh-verma-707b26145" target="_blank" style="font-size:25px;color:#0a66c2;margin:5px;"><i class="fab fa-linkedin-in"></i></a></li>
        <li class="ms-3"><a class="link-dark" href="https://api.whatsapp.com/send?phone=+919807559692" target="_blank" style="font-size:25px;color:#25d366;margin:5px;"><i class="fab fa-whatsapp"></i></a></li>
      </ul>      
    </div>  
  <!-- </div> -->
</div>
</footer>
<style>

  @media screen and (max-width:1040px){
    footer > .container > .row > .footer-contact.col-3{
      min-width:50% !important;
      margin-bottom:10px;
    }
    footer > .container > .row > .footer-quicklink.col-3{
      min-width:50% !important;
      margin-bottom:10px;
    }
    footer > .container > .row > .footer-services.col-3{
      min-width:50% !important;
      margin-bottom:10px;
    }
    footer > .container > .row > .footer-terms.col-3{
      min-width:50% !important;
      margin-bottom:10px;
    }
  }

  @media screen and (max-width:768px){
    footer > .container > .row > .footer-contact.col-3{
      min-width:90% !important;
    }
    footer > .container > .row > .footer-quicklink.col-3{
      min-width:90% !important;
    }
    footer > .container > .row > .footer-services.col-3{
      min-width:90% !important;
    }
    footer > .container > .row > .footer-terms.col-3{
      min-width:90% !important;
    }
  }

  footer div ul li a i{
    margin-right:10px;
  }

</style>