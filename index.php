<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e8ddae4d2d.js" crossorigin="anonymous"></script>
    <title>TheFbler Fotografie</title>

    <?php echo file_get_contents("head.html") ?>
  </head>

  <body>
    <i onclick="topFunction()" id="backToTopBtn" class="fas fa-chevron-circle-up"></i>
    <!-- Header per PHP einfügen -->
    <?php echo file_get_contents("header.html"); ?>

    <!-- HOME -->
    <section id="home"></section>

    <!-- ABOUT -->

    <section id="about">
      <h3 class="centerText">ÜBER MICH</h3>
      <hr/>
      <div>
        <ul>
          <li id="portrait">
            <img src="img/avatar.jpg" alt="Portrait von Fabian" title="Fabian Clasen">
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
      <div class="masonryWrapper">
        <div class="masonry">
          <div class="brick">
            <img  class="lazy-load"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII="
                  data-src="img/Anna_Sonnenuntergang.jpg"
                  alt="Anna auf einer Bank bei Sonnenuntergang"
                  title="Anna bei Sonnenuntergang"/>
          </div>
          <div class="brick">
            <img  class="lazy-load"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII="
                  data-src="img/Laika.jpg"
                  alt="Laika"
                  title="Laika"/>
          </div>
          <div class="brick">
            <img  class="lazy-load"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII="
                  data-src="img/Balmoral_Zigarre.jpg"
                  alt="Balmoral Zigarre"
                  title="Balmoral Zigarre"/>
          </div>
          <div class="brick">
            <img  class="lazy-load"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII="
                  data-src="img/Moewe_Ostsee.jpg"
                  alt="Eine Möwe am Ostseestrand"
                  title="Ostseestrand Möwe"/>
          </div>
          <div class="brick">
            <img  class="lazy-load"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII="
                  data-src="img/SONY_Alpha_Day.jpg"
                  alt="Sony Alpha Day München"
                  title="Sony Alpha Day München"/>
          </div>
          <div class="brick">
            <img  class="lazy-load"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII="
                  data-src="img/Anna_BW.jpg"
                  alt="Anna in Schwarz/Weiß"
                  title="Anna in Schwarz/Weiß"/>
          </div>
          <div class="brick">
            <img  class="lazy-load"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII="
                  data-src="img/Hochzeit_Museumsdorf.jpg"
                  alt="Hochzeitspaar im Museumsdorf"
                  title="Hochzeitspaar im Museumsdorf"/>
          </div>
          <div class="brick">
            <img  class="lazy-load"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII="
                  data-src="img/Markus_Zigarette.jpg"
                  alt="Markus mit Zigarette Lost Place Portrait"
                  title="Markus Lost Place"/>
          </div>
          <div class="brick">
            <img  class="lazy-load"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII="
                  data-src="img/Waldohreule.jpg"
                  alt="Waldohreule"
                  title="Waldohreule"/>
          </div>
        </div>
      </div>
    </section>

    <!-- Kontaktformular ohne SSL Verschlüsselung der Seite rechtlich zu riskant. -->
    <section id="contact">
      <h3 class="centerText">KONTAKT</h3>
      <hr/>
      <?php
      if(!empty($_POST["sendMail"])) {
      	$name = $_POST["userName"];
      	$email = $_POST["userEmail"];
      	$content = $_POST["content"];

      	$toEmail = "fabian@thefbler.de";
        $mailHeaders = "From: " . $name . "<". $email .">\r\n";
      	if(mail($toEmail, "Kontaktformular: Anfrage von " . $_POST["userName"], $content, $mailHeaders)) {
      	    $message = "Anfrage wurde erfolgreich gesendet!";
      	    $type = "success";
      	}
      }
      require_once "contact.php";
      ?>
    </section>

    <!-- Footer per PHP einfügen -->
    <?php echo file_get_contents("footer.html"); ?>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/mobile-menu.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/lazy-load.js"></script>
  </body>
