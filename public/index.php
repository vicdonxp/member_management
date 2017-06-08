<?php
require  "../vendor/autoload.php";
require "../src/define.php";
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/7/2017
 * Time: 11:05 PM
 */

use DetariAuth\Authentication\Authentication as Aut;
use DetariAuth\Authentication\Encryption as Encrypt;
use DetariAuth\Authentication\SubmitFormsProcessors as Sum;

$autDetails = new Aut;
$crypto = new Encrypt;

$header =  $autDetails->header();
$footer = $autDetails->footer();
$list = $autDetails->ListOfQuestions();

$plain_txt = "This is my plain text";

$encrypted_txt = $crypto->encrypt_decrypt('encrypt', $plain_txt);

$decrypted_txt = $crypto->encrypt_decrypt('decrypt', $encrypted_txt);

$sum = new Sum;

//print_r($sum->selectData());
echo $header;
?>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <a class="btn btn-primary" id="loginLink" >Register</a>
                <button class="btn btn-lg btn-primary sweet-10" onclick="_gaq.push(['_trackEvent', 'example, 'try', 'Primary']);">Primary</button>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">

     <script>
         document.querySelector('.sweet-10').onclick = function(){
             swal("Good job!", "You clicked the button!", "success")
         };
     </script>

    <div id="login-overlay" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Login to site.com</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="well">
                            <form id="loginForm" method="POST" action="/login/" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="username" class="control-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                    <span class="help-block"></span>
                                </div>
                                <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>

                                <button type="submit" class="btn btn-success btn-block">Login</button>
                           </form>
                        </div>

                </div>
            </div>
        </div>
        </div>
    </div>


           <div class='row'>

            <div class='Header'>
               <p class='responseMessage' hidden></p>
            </div>
        </div>
        <div class='row'

        <form id='register' hidden>
            <div id='form-step1'>
                <div class='form-group'>
                    <label for='username'>Username</label>
                    <input type='text' class='form-control' id='username' autocomplete='off'>
                    <small class='form-text text-muted'>Choose Username</small>
                </div>

                <div class='form-group'>
                    <label for='password'>Password</label>
                    <input type='password' class='form-control' id='password' autocomplete='off'>
                    <small class='form-text text-muted'>Enter Your Desired Password</small>
                </div>

                <div class='form-group'>
                    <label for='re-password'>Re- Enter Password</label>
                    <input type='password' class='form-control' id='re-password' autocomplete='off'>
                    <small class='form-text text-muted'>Re Enter Your Desired Password</small>
                </div>



                <div class='form-group'>
                    <label for='email'>Email</label>
                    <input type='text' class='form-control' id='email' autocomplete='off'>
                    <small class='form-text text-muted'>Enter you Email</small>
                </div>

                <div class='form-group'>
                    <button class='btn btn-primary' id='first-step'>Next</button>

                </div>
            </div>
            <div id='form-step2' hidden>
                <div class='form-group'>
                    <label for='fname'>First Name</label>
                    <input type='text' class='form-control' id='fname' autocomplete='off'>
                    <small class='form-text text-muted'>Enter Your First Name</small>
                </div>

                <div class='form-group'>
                    <label for='lname'>Last Name</label>
                    <input type='text' class='form-control' id='lname' autocomplete='off'>
                    <small class='form-text text-muted'>Enter Your Last Name</small>
                </div>
         <div id='question-set1'>
      <div class='form-group'>
        <label for='select-question'>Security Question</label>
      <select  class='form-control' id='select-question'>
          <?php foreach($list as $lists): ?>
              <option value="<?php echo $crypto->encrypt_decrypt('encrypt', $lists['id']);?>"><?php echo $lists['answer'];?></option>
          <?php endforeach;?>
              </select>
      </div>
        <div class='form-group'>
        <label for='answer1'>Answer</label>
                <input type='text' class='form-control' id='answer1' autocomplete='off'>
                <small class='form-text text-muted'>Answer</small>
      </div>
      </div>
      
         <div id='question-set2'>
      <div class='form-group'>
        <label for='select-question2'>Security Question 2</label>
      <select  class='form-control' id='select-question2'>
          <?php foreach($list as $lists): ?>
              <option value="<?php echo $crypto->encrypt_decrypt('encrypt', $lists['id']);?>"><?php echo $lists['answer'];?></option>
          <?php endforeach;?>
      </select>
       </select>
      </div>
        <div class='form-group'>
        <label for='answer2'>Answer 2</label>
                <input type='text' class='form-control' id='answer2' autocomplete='off'>
                <small class='form-text text-muted'>Answer 2</small>
      </div>
      </div>
      
         <div id='question-set3'>
      <div class='form-group'>
        <label for='select-question3'>Security Question 3</label>
      <select  class='form-control' id='select-question3'>
          <?php foreach($list as $lists): ?>
              <option value="<?php echo $crypto->encrypt_decrypt('encrypt', $lists['id']);?>"><?php echo $lists['answer'];?></option>
          <?php endforeach;?>
      </select>
       </select>
      </div>
        <div class='form-group'>
        <label for='answer3'>Answer 3</label>
                <input type='text' class='form-control' id='answer3' autocomplete='off'>
                <small class='form-text text-muted'>Answer 3</small>
      </div>
      </div>
      
         <div id='question-set4'>
      <div class='form-group'>
        <label for='select-question4'>Security Question</label>
      <select  class='form-control' id='select-question4'>
          <?php foreach($list as $lists): ?>
              <option value="<?php echo $crypto->encrypt_decrypt('encrypt', $lists['id']);?>"><?php echo $lists['answer'];?></option>
          <?php endforeach;?>
      </select>
       </select>
      </div>
        <div class='form-group'>
        <label for='answer4'>Answer 4</label>
                <input type='text' class='form-control' id='answer4' autocomplete='off'>
                <small class='form-text text-muted'>Answer 4</small>
      </div>
      </div>
      
         <div id='question-set5'>
      <div class='form-group'>
        <label for='select-question5'>Security Question 5</label>
      <select  class='form-control' id='select-question5'>
          <?php foreach($list as $lists): ?>
              <option value="<?php echo $crypto->encrypt_decrypt('encrypt', $lists['id']);?>"><?php echo $lists['answer'];?></option>
          <?php endforeach;?>
      </select>
       </select>
      </div>
        <div class='form-group'>
        <label for='answer5'>Answer 5</label>
                <input type='text' class='form-control' id='answer5' autocomplete='off'>
                <small class='form-text text-muted'>Answer 5</small>
      </div>
      </div>
      
        <div class='form-group'>

<!--         <button class='btn btn-warning' id='back'>Back</button>-->
         <button class='btn btn-primary' id='submitForm'>Finish</button>
            <small class="text-muted" id='remarks'>Please you have 5 Questions to answer, keep answering until final question 5</small>
     
    </div>
     
  </div>
  </form>

</div>
</div>
</div>
<?php echo $footer;?>
