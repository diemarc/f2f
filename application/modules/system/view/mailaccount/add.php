<div id="page-wrapper">
    <h2>system/mailaccount/New record</h2>
    <form action="https://local.factufacil/system/mailaccount/save" 
          id="formKerana" name="formKerana" method="POST" class="form-horizontal"
          accept-charset="utf-8">
              <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            <a href="https://local.factufacil/system/mailaccount/index" 
               class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </header>

        <div class='form-group form-group-sm'> 
            <label for='f_account' class='col-sm-2 control-label'>Account</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_account" name="f_account" class="form-control"  maxlength="45" required  />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_mail_address' class='col-sm-2 control-label'>Mail_address</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_mail_address" name="f_mail_address" class="form-control"  maxlength="150" required  />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_mail_username' class='col-sm-2 control-label'>Mail_username</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_mail_username" name="f_mail_username" class="form-control"  maxlength="150" required  />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_mail_password' class='col-sm-2 control-label'>Mail_password</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 

                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_mail_smtp_server' class='col-sm-2 control-label'>Mail_smtp_server</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_mail_smtp_server" name="f_mail_smtp_server" class="form-control"  maxlength="150" required  />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_mail_smtp_auth' class='col-sm-2 control-label'>Mail_smtp_auth</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="radio" id="f_mail_smtp_auth" name="f_mail_smtp_auth" class="radio_inline" value="1">Yes <input type="radio" id="f_mail_smtp_auth" name="f_mail_smtp_auth" class="radio_inline" value="0">No
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_mail_smtp_port' class='col-sm-2 control-label'>Mail_smtp_port</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="number" id="f_mail_smtp_port" name="f_mail_smtp_port" class="form-control" maxlength="2" required />
                </div> 
            </div> 
        </div> 


    </form>
</div>