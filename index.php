<!DOCTYPE html>
<html lang="de">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e8ddae4d2d.js" crossorigin="anonymous"></script>
    <title>TheFbler Fotografie</title>

    <?php echo file_get_contents("head.html") ?>
  </head>

  <body>
    <i onclick="topFunction()" id="backToTopBtn" class="fas fa-chevron-circle-up"></i>
    <div class="tilt-in-fwd-br" id="socialMedia">
      <a id="noMoreSocial" onclick="noMoreSocialMedia()" target="_blank" rel="nofollow noopener"><i class="far fa-times-circle"></i></a>
      <p>Besucht auch meine Social Media Kanäle</p>
      <a class="social2" target="_blank" rel="noopener" href="https://www.facebook.com/fabian.clasen.3"><i class="fab fa-facebook"></i></a>
      <a class="social2" target="_blank" rel="noopener" href="https://www.instagram.com/thefbler"><i class="fab fa-instagram"></i></a>
      <a class="social2" target="_blank" rel="noopener" href="https://www.xing.com/profile/Fabian_Clasen2"><i class="fab fa-xing"></i></a>
      <a class="social2" target="_blank" rel="noopener" href="https://twitter.com/thefbler"><i class="fab fa-twitter"></i></a><br/>
      <img id="socialImage" class="lazyload" data-src="img/avatar.jpg" alt="Portrait von Fabian" title="Fabian Clasen">
    </div>
    <!-- Header per PHP einfügen -->
    <?php echo file_get_contents("header.html"); ?>

    <!-- HOME -->
    <section id="home">
      <!-- Rounded switch -->
      <label class="switch">
        <input id="darkModeToggle" type="checkbox" onchange="toggleDarkMode(this)">
        <span class="slider round"></span>
      </label>
    </section>

    <!-- ABOUT -->

    <section id="about">
      <h3 class="centerText">ÜBER MICH</h3>
      <hr/>
      <div>
        <ul>
          <li id="portrait">
            <img class="lazyload" data-src="img/avatar.jpg" alt="Portrait von Fabian" title="Fabian Clasen">
          </li>
          <li id="vorstellung">
            <p>Servus, mein Name ist <strong>Fabian Clasen</strong>.
              <br/><br/>Ich bin

              <?php
                $datetime1 = date_create('now');
                $datetime2 = date_create('1997-03-28');
                $interval = date_diff($datetime1, $datetime2);
                echo $interval->format('%Y');
              ?>

              Jahre alt und komme aus dem wunderschönen Markt Schönberg im
              Bayerwald. Seit über vier Jahren beschäftige ich mich mit der
              Fotografie.
              <br/><br/>
              Meine erste Kamera habe ich mir im Januar 2016 gekauft. Eine
              SONY a3000 mit Kit-Objektiv und einem manuellen Aufsteckblitz.
              Die a3000 hat mich über das Jahr hinweg auf diversen
              Veranstaltungen begleitet. Im Juni 2016 folgte meine
              SONY a57 mit Kit-Objektiv. Im Laufe der Zeit kam ein neuer
              Aufsteckblitz von Metz hinzu. Ein wichtiger Kauf fand Mitte 2018
              statt, meine erste 50mm Festbrennweite (SAL50F18). Durch dieses
              Objektiv machte ich meine ersten Erfahrungen mit Portraits. Nach
              über drei Jahren und tausenden Bildern wurde es erneut Zeit für
              ein Upgrade. Die Wahl fiel auf die SONY a6000 mit dem 16-50mm
              Kit-Objektiv und einer 50mm Vollformat Festbrennweite.
            </p>
          </li>
      </div>
    </section>

    <section id="portfolio">
      <h3 class="centerText">PORTFOLIO</h3>
      <hr/>
      <!-- Zweites masonry um weitere Bilder nachladen zu können -->
      <div class="masonryWrapper">
        <?php
          $verzeichnis = "img/masonry";
          // Test, ob es sich um ein Verzeichnis handelt
          if (is_dir($verzeichnis)) {
            // einlesen der Verzeichnisses
            $files = scandir($verzeichnis);
            sort($files);
            foreach($files as $file) {
              if($file !== "." && $file !== "..") {
                if($file === '1_masonry') {
                  echo "<div class=\"masonry\">";
                } else {
                  echo "<div class=\"masonry loadMoreItems\">";
                }

                $verzeichnis2 = $verzeichnis . "/" . $file;
                $files2 = scandir($verzeichnis2);
                sort($files2);
                foreach($files2 as $file2) {
                  // Aktuelles Verzeichnis . und darüberliegendes .. aussortieren
                  if($file2 !== "." && $file2 !== "..") {
                    $str = substr($file2, 2);
                    $strId = substr($str, 0, strpos($str, "."));
                    echo "<div class=\"brick\">";
                    echo "<img onclick=\"getExif(this," . $strId . ")\" class=\"lazyload\" data-src=\"" . $verzeichnis2 . "/" . $file2 . "\" alt=\"" . $str . "\"/>";
                    echo "<div class=\"exifPosition\" id=\"" . $strId . "\"></div>";
                    echo "</div>";
                  }
                }
                echo "</div>";
              }
            }
          }
          ?>
      </div>
      <div class="centerText">
        <div class="sk-folding-cube">
          <div class="sk-cube1 sk-cube"></div>
          <div class="sk-cube2 sk-cube"></div>
          <div class="sk-cube4 sk-cube"></div>
          <div class="sk-cube3 sk-cube"></div>
        </div>
        <a id="loadMore" class="btn" onclick="loadMoreItems()" target="_blank" rel="nofollow noopener">Mehr laden</a>
      </div>
    </section>

    <!-- Kontaktformular ohne SSL Verschlüsselung der Seite rechtlich zu riskant. -->
    <!-- <section id="contact">
      <h3 class="centerText">KONTAKT</h3>
      <hr/> -->
      <?php
      /*if(!empty($_POST["sendMail"])) {
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          $message = "Bitte beachten Sie das Captcha!";
          $type = "errorContact";
        } else {//Wenn das Captcha geklickt wurde weiter prüfen
          $ff = file('config/keys.txt');  //Secret Key nicht im Repo speichern
          foreach($ff as $key=>$value) {
            $ffe = explode("=", $value);//Wert vor und nach = auslesen
            $ffa[$ffe[0]]=$ffe[1];//Key Value Paar in assozitivem Array speichern
          }

          $secretKey = $ffa["captchasecretkey"];//Secret Key auslesen
          // post request to server
          $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
          $response = file_get_contents($url);
          $responseKeys = json_decode($response,true);
          // should return JSON with success as true
          if($responseKeys["success"]) {
            $name = $_POST["userName"];
          	$email = $_POST["userEmail"];
          	$content = $_POST["content"];

          	$toEmail = "fabian@thefbler.de";
            $mailHeaders = "From: " . $name . "<". $email .">\r\n";
          	if(mail($toEmail, "Kontaktformular: Anfrage von " . $_POST["userName"], $content, $mailHeaders)) {
          	    $message = "Anfrage wurde erfolgreich gesendet!";
          	    $type = "successContact";
          	}
          } else {
            $message = "Anfrage konnte nicht gesendet werden!";
            $type = "errorContact";
          }
        }
      }
      require_once "contact.php";*/
      ?>
    <!-- </section> -->

    <!-- Footer per PHP einfügen -->
    <?php echo file_get_contents("footer.html"); ?>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/mobile-menu.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="js/lazysizes.min.js" async=""></script>
    <script src="js/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/exif-js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </body>
