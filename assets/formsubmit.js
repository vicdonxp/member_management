/**
 * Created by USER on 6/8/2017.
 */
var submit = {};


submit.registerDetails = {
    userame : $('#username'),
    password : $('#password'),
    password2 :$('#re-password'),
    email : $('#email')
   };

submit.details = {
    fname : $('#fname'),
    lname: $('#lname'),
    question1: $('#select-question'),
    answer1: $('#answer1'),
    question2: $('#select-question2'),
    answer2: $('#answer2'),
    question3: $('#select-question3'),
    answer3: $('#answer3'),
    question4: $('#select-question4'),
    answer4: $('#answer4'),
    question5: $('#select-question5'),
    answer5: $('#answer5')
   };





submit.formsubmit = function(){
    var user = submit.registerDetails;
    var data = submit.details;

    var pass1 = user.password.val();
    var password = CryptoJS.SHA512(pass1).toString();

        var regData = {
            action: "submitFormFinal",
            userDat: {
                fname: data.fname.val(),
                lname: data.lname.val(),
                question1: data.question1.val(),
                answer1:data.answer1.val(),
                question2: data.question2.val(),
                answer2:data.answer2.val(),
                question3: data.question3.val(),
                answer3:data.answer3.val(),
                question4: data.question4.val(),
                answer4:data.answer4.val(),
                question5: data.question5.val(),
                answer5:data.answer5.val()
            },
            regisData:{
                username: user.userame.val(),
                password: password,
                email: user.email.val()
            }
        };
    $.ajax({
        url: '../src/dataFilter.php',
        type: "POST",
        datatype: 'json',
        data: regData,
        success: function (result) {
            swal("Good job!", "You clicked the button!", "success");
        }
    });


};


submit._validate = function(){
    var value = submit.registerDetails;
   if(value.password.val().toString() === value.password2.val().toString()){
       $('#first-step').prop('disabled',false);
   }else{
       $('#first-step').prop('disabled',true);
       $('.responseMessage').fadeIn(500).fadeOut(7000).html("Passwords Do not match, Please enter a matching passwords to continue");
   }

}