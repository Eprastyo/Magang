<html>
    <head>		
        <title>Codeigniter Email</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body> 
        <div class="main">
            <div id="content">
                <h2 id="form_head">Codelgniter Email</h2><br/>
                <hr>
                <div id="form_input">
                    <div class="msg">
                        <?php
                        if (isset($message_display)) {
                            echo $message_display;
                        }
                        ?>
                    </div>
                    <?php
                    echo '<div class="error_msg">';
                    echo validation_errors();
                    echo "</div>";
                    echo form_open('ci_email_tutorial/send_mail');
                    echo form_label('Email-ID');
                    echo "<div class='all_input'>";
                    $data_email = array(
                        'type' => 'email',
                        'name' => 'user_email',
                        'id' => 'e_email_id',
                        'class' => 'input_box',
                        'placeholder' => 'Please Enter Email'
                    );
                    echo form_input($data_email);
                    echo "</div>";
                    echo "<br/>";
                    echo form_label('Password');
                    echo "<div class='all_input'>";
                    $data_password = array(
                        'name' => 'user_password',
                        'id' => 'password_id',
                        'class' => 'input_box',
                        'placeholder' => 'Please Enter Password'
                    );
                    echo form_password($data_password);
                    echo "</div>";
                    echo "<br/>";
                    echo form_label('Name');
                    echo "<div class='all_input'>";
                    $data_email = array(
                        'name' => 'name',
                        'class' => 'input_box',
                        'placeholder' => 'Please Enter Name'
                    );
                    echo form_input($data_email);
                    echo "</div>";
                    echo "<br/>";
                    echo form_label('To');
                    echo "<div class='all_input'>";
                    $data_email = array(
                        'type' => 'email',
                        'name' => 'to_email',
                        'class' => 'input_box',
                        'placeholder' => 'Please Enter Email'
                    );
                    echo form_input($data_email);
                    echo "</div>";
                    echo "<br/>";
                    echo form_label('Subject');
                    echo "<div class='all_input'>";
                    $data_subject = array(
                        'name' => 'subject',
                        'class' => 'input_box',
                        'placeholder' => 'Subject'
                    );
                    echo form_input($data_subject);
                    echo "</div>";
                    echo "<br/>";
                    echo form_label('Message');
                    echo "<div class='all_input'>";
                    $data_message = array(
                        'name' => 'message',
                        'rows' => 5,
                        'cols' => 32,
                        'placeholder' => 'Write Message Here...'
                    );
                    echo form_textarea($data_message);
                    echo "</div>";
                    echo "<br/>";
                    ?>
                </div>
                <div id="form_button">
                    <?php echo form_submit('submit', 'Send', "class='submit'"); ?>
                </div>                   
                <?php echo form_close(); ?>
            </div> 
        </div>
         <!-- Div Fugo is Advertisement div -->
        <div id="fugo">
          <a href="http://www.formget.com/app/"><img src="<?php echo base_url(); ?>images/formGetadv-1.jpg" /></a>  
        </div>
    </body>
</html>







