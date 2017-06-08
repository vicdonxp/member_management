<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/7/2017
 * Time: 10:49 PM
 */
namespace DetariAuth\Authentication;

class Authentication{
    public function hasCheese($bool = true)
    {
        return $bool;
    }

    public function test(){
        return true;
    }

    public function header(){
        $header  = '<!DOCTYPE html>';
        $header .= '<html>
<head>
<title>Test Site</title>
<script src="../assets/jquery.min.js"></script>
<link rel="stylesheet" href="../assets/bootstrap.min.css">
<link rel="stylesheet" href="../dist/sweetalert.css">
<script src="../assets/bootstrap.min.js"></script>

<link rel="stylesheet" href="../assets/style.css">
</head>';
        $header .='<body>';

        return $header;
    }

    public function footer(){
        $footer = '<script src="../assets/control.js"></script>
<script src="../dist/sweetalert.min.js"></script>
                  <script src="../assets/sha512.js"></script>
                  <script src="../assets/formsubmit.js"></script>
                  </body>';
        $footer .= '</html>';
        return $footer;
    }

    public function ListOfQuestions(){
        $arrayQuestions = array(
         array("id"=>"8908", "answer"=>"First Name of Eldest Son"),
         array("id"=>"7867", "answer"=>"Name of First School"),
         array("id"=>"4533", "answer"=>"What is the Name of you Pet"),
         array("id"=>"4342", "answer"=>"What is your best Color"),
         array("id"=>"23434", "answer"=>"What Town where you born"),
         array("id"=>"2332", "answer"=>"What is the your best friends name"),
         array("id"=>"2342", "answer"=>"What religion do you believe in"),
         array("id"=>"23634", "answer"=>"What is your hidden gender"),
         array("id"=>"23523", "answer"=>"Choose your best 3 numbers"),
         array("id"=>"235645", "answer"=>"What is the best number pattern")
        );

        return $arrayQuestions;

    }

}