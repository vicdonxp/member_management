<?php
namespace DetariAuth\Authentication;
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/8/2017
 * Time: 3:28 AM
 */
use DetariAuth\Authentication\Database as Db;
use DetariAuth\Authentication\Encryption as Encrypt;

class SubmitFormsProcessors
{
    private $db;


    public function __construct()
    {
        $this->db = Db::getInstance();

    }


  public function finalSubmit($val){
        $data =  $val['userDat'];
        $reg =   $val['regisData'];
        $encrypt = new Encrypt;

  $this->db->insert('re_userstab',array(
      'username' => $reg['username'],
      'password' => $encrypt->encrypt_decrypt('encrypt',$reg['password']),
      'email' => $reg['email']
        )
  );
  $id = $this->db->lastInsertId();

     $this->db->insert('user_details', array(
             'user_id' => $id,
             'firstname' => $data['fname'],
             'lastname' => $data['lname'],
             'question1' => $data['question1'],
             'answer1' => $data['answer1'],
             'question2' => $data['question2'],
             'answer2' => $data['answer2'],
             'question3' => $data['question3'],
             'answer3' => $data['answer3'],
             'question4' => $data['question4'],
             'answer4' => $data['answer4'],
             'question5' => $data['question5'],
             'answer5' => $data['answer5']
         )
     );
 }
 public function selectData(){
     $encrypt = new Encrypt;
     $result = $this->db->select("SELECT * FROM `user_details`");

     return $result;

 }


}