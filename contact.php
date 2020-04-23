<form name="contactForm" method="post" enctype="multipart/form-data"
  onsubmit="return validateContactForm()">
  <label>Name:</label><br/>
  <input type="text" class="inputTextfield" name="userName" id="name"/><br/>
  <span id="errorName"></span><br/>
  <label>E-Mail:</label><br/>
  <input type="text" class="inputTextfield" name="userEmail" id="email"/><br/>
  <span id="errorMail"></span><br/>
  <label>Nachricht:</label><br/>
  <textarea name="content" id="content" class="inputTextarea" cols="60" rows="6"></textarea><br/>
  <span id="errorContent"></span><br/>
  <input type="submit" name="sendMail" class="btnSubmit" value="Senden" />
  <div id="statusMessage">
    <?php
      if (! empty($message)) {
    ?>
      <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
    <?php
      }
    ?>
  </div>
</form>
