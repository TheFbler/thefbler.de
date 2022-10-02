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
  <input type="checkbox" id="datenschutzCheckbox" name="datenschutzCheckbox">
  <label id="datenschutzCheckboxLabel" for="datenschutzCheckbox">Die <a href="datenschutz.php">Datenschutzerklärung</a> habe ich zur Kenntnis genommen.</label><br/>
  <span id="errorDatenschutz"></span><br/>
  <label>Spamschutz: EINS + 1 =
    <input type="text" class="inputTextfieldSmall" name="spamschutz" id="spamschutz"/>
  </label><br/>
  <span id="errorSpamschutz"></span><br/>
  <input type="submit" name="sendMail" class="btn" value="Senden" /><br/>
</form>
