<form class="form-horizontal" role="form" method="post" action="contact_form.php">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nom*</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="form_name" name="form_name" placeholder="Nom & Prénom" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email*</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" id="form_email" name="form_email" placeholder="example@domain.com" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="telephone" class="col-sm-2 control-label">Téléphone</label>
        <div class="col-sm-8">
            <input type="tel" class="form-control" id="form_subject" name="form_subject" placeholder="07 81 11 31 33" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label">Message</label>
        <div class="col-sm-8">
            <textarea class="form-control" rows="4" name="form_message" id="form_message"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="code" class="col-sm-2 control-label"> Code de validation:</label>
        <div class="col-sm-8">
            <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br/>
        </div>
    </div>
     <div class="form-group">
        <label for="saisie-code" class="col-sm-2 control-label">Saisissez le code ci-dessus*</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="form_name1" name="form_name1" value="" /><br/>
        </div>
    </div>
    <div class="form-group">
        <label for="code" class="col-sm-2 control-label">Code invisible? cliquez <a href='javascript: refreshCaptcha();'>ICI</a></label>
        <div class="col-sm-8">
            <input class="btn btn-primary" id="submit-form" type="submit" name="submit"  value="submit" />
        </div>
    </div>		
    <div class="form-group">
        <div class="col-sm-8 col-sm-offset-2">
        	<div id="success"></div>
        </div>
    </div>
</form>