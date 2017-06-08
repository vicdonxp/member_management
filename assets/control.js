/**
 * Created by USER on 6/8/2017.
 */
$(document).ready(function() {
    $('#login-overlay').show();

    $('#loginLink').click(function(){
        $('#register').show();
        $('#login-overlay').hide();
    });


    $('#first-step').prop('disabled',true);

    $('#re-password').blur(function(){
        submit._validate();
    });
      //for the input/select style expansion on focus
    $('input').focus(function () {
        $(this).animate({width: '+=50'}, 'slow');
    }).blur(function () {
        $(this).animate({width: '-=50'}, 'slow');
    });

    $('select').focus(function () {
        $(this).animate({width: '+=50'}, 'slow');
    }).blur(function () {
        $(this).animate({width: '-=50'}, 'slow');
    });


    // toggle between the various steps
    $('#first-step').click(function(){
        swal("Good job!", "You clicked the button!", "success");
        $('#form-step1, #form-step2').toggle();
        $('#answer1').prop('disabled', true);
        $('#answer2').prop('disabled', true);
        $('#answer3').prop('disabled', true);
        $('#answer4').prop('disabled', true);
        $('#answer5').prop('disabled', true);
        $('#submitForm').hide();
        $('#question-set2').hide();
        $('#question-set3').hide();
        $('#question-set4').hide();
        $('#question-set5').hide();
        });

    // $('#back').click(function(){
    //     $('#form-step2, #form-step1').toggle();
    //     });

    // toggle between the various steps
    $('#answer1').blur(function(){
        $('#question-set2').show();
        $('#question-set1').hide();
        $('#question-set3').hide();
        $('#question-set4').hide();
        $('#question-set5').hide();
    });

    $('#answer2').blur(function(){
        $('#question-set3').show();
        $('#question-set1').hide();
        $('#question-set2').hide();
        $('#question-set4').hide();
        $('#question-set5').hide();
    });

    $('#answer3').blur(function(){
        $('#question-set4').show();
        $('#question-set1').hide();
        $('#question-set2').hide();
        $('#question-set3').hide();
        $('#question-set5').hide();
    });
    $('#answer4').blur(function(){
        $('#question-set5').show();
        $('#question-set1').hide();
        $('#question-set2').hide();
        $('#question-set3').hide();
        $('#question-set4').hide();
    });
    $('#answer5').blur(function () {
        $('#submitForm').show();
        $('#next').hide();
        $('#remarks').hide();
    });

    ////selection to activate the answer pane
    $('#select-question').change(function () {
        $('#answer1').prop('disabled', false);
    });
    $('#select-question2').change(function () {
        $('#answer2').prop('disabled', false);
    });
    $('#select-question3').change(function () {
        $('#answer3').prop('disabled', false);
    });
    $('#select-question4').change(function () {
        $('#answer4').prop('disabled', false);
    });
    $('#select-question5').change(function () {
        $('#answer5').prop('disabled', false);
    });


    //hide question set
    $('#submitForm').click(function (e) {
        e.preventDefault();
        submit.formsubmit();

    })

});