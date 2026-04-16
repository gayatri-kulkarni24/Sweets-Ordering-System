<?php include "includes/header.php"; ?>

<style>

.contact-container{
  max-width:800px;
  margin:40px auto;
  padding:30px;
  background:white;
  border-radius:12px;
  box-shadow:0 4px 15px rgba(0,0,0,0.2);
  text-align:center;
}

.contact-container h2{
  color:#ff6f61;
  margin-bottom:20px;
}

.contact-box{
  margin:20px 0;
  font-size:18px;
  color:#444;
}

.contact-box i{
  color:#ff6f61;
  margin-right:10px;
  font-size:22px;
}

.social-icons a{
  color:#ff6f61;
  font-size:26px;
  margin:0 10px;
  text-decoration:none;
  transition:0.3s;
}

.social-icons a:hover{
  color:black;
}

.map{
  margin-top:25px;
}

</style>

<!-- Font Awesome -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<div class="contact-container">

  <h2>Contact Us 📞</h2>

  <div class="contact-box">
    <i class="fas fa-store"></i>
    Dhananjay's Sweets 
  </div>

  <div class="contact-box">
    <i class="fas fa-map-marker-alt"></i>
    Main Market, Belapur-Shrirampur,India
  </div>

  <div class="contact-box">
    <i class="fas fa-phone"></i>
    +91 9359485159
  </div>

  <div class="contact-box">
    <i class="fas fa-clock"></i>
    10 AM – 10 PM (Daily)
  </div>

  <div class="social-icons">
    <a href="https://instagram.com/dhananjay_milk_centre"
       target="_blank">
       <i class="fab fa-instagram"></i>
    </a>
  </div>

  <div class="map">
    <iframe
      src="https://www.google.com/maps?q=Belapur Bk.,Maharashtra&output=embed"
      width="100%"
      height="250"
      style="border:0;border-radius:10px;">
    </iframe>
  </div>

</div>

<?php include "includes/footer.php"; ?>
