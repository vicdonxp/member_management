<?php
namespace DetariAuth\Authentication;

//DATABASE CONFIGURATION

define('DB_HOST', 'localhost');

define('DB_TYPE', 'mysql');

define('DB_USER', 'root');

define('DB_PASS', 'eeeeee22');

define('DB_NAME', 'newsystem');
/**
 * Class ASDatabase
 */
class Database extends \PDO
{
    /**
     * @var Instance of ASDatabase class itself
     */
    private static $instance;

    /**
     * Class constructor
     * Parameters defined as constants in ASConfig.php file
     * @param $DB_TYPE Database type
     * @param $DB_HOST Database host
     * @param $DB_NAME Database username
     * @param $DB_USER User's username
     * @param $DB_PASS Users's password
     */
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        try {
            parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME.';charset=utf8', $DB_USER, $DB_PASS);
            $this->exec('SET CHARACTER SET utf8');

            // comment this line if you don't want error reporting
//            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        } catch (PDOException $e) {
            die ( 'Connection failed: ' . $e->getMessage() );
        }
    }

    /**
     * Instance of ASDatabase class. Singleton pattern.
     * @return ASDatabase|Instance Instance of ASDatabase class
     */
    public static function getInstance() {
        // create instance if doesn't exist
        if ( self::$instance === null )
            self::$instance = new self(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);

        return self::$instance;
    }

    /**
     * Select
     * @param $sql  An SQL string
     * @param array $array Paramters to bind
     * @param int $fetchMode A PDO Fetch mode
     * @return array
     */
    public function select($sql, $array = array(), $fetchMode = \PDO::FETCH_ASSOC)
    {
        $db = self::getInstance();

        $sth = $db->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();

        $result = $sth->fetchAll($fetchMode);

        $sth->closeCursor();

        return $result;
    }

    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data)
    {
        $db = self::getInstance();

        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $db->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
        $sth->closeCursor();
    }

    /**
     * Update
     * @param $table A name of table to insert into
     * @param $data An associative array where keys have the same name as database columns
     * @param $where the WHERE query part
     * @param array $whereBindArray Parameters to bind to where part of query
     */
    public function update($table, $data, $where, $whereBindArray = array())
    {
        $db = self::getInstance();

        ksort($data);

        $fieldDetails = NULL;

        foreach($data as $key=> $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $sth = $db->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        foreach ($whereBindArray as $key => $value) {
            $sth->bindValue(":$key", $value);
        }


        $sth->execute();

        $sth->closeCursor();
    }

    /**
     * Delete
     *
     * IF YOU USE PREPARED STATEMENTS, DON'T FORGET TO UPDATE $bind ARRAY!
     *
     * @param $table
     * @param $where
     * @param array $bind
     * @param int $limit
     */
    public function delete($table, $where, $bind = array())
    {
        $db = self::getInstance();

        $sth = $db->prepare("DELETE FROM $table WHERE $where");

        foreach ($bind as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();

        $sth->closeCursor();
    }

    public function truncate($table){

        $db = self::getInstance();
        /* Delete all rows from the FRUIT table */
        $del = $db->prepare("DELETE FROM $table");
        $del->execute();
        $del->closeCursor();

    }

    /**
     * Delete
     *
     * IF YOU USE PREPARED STATEMENTS, DON'T FORGET TO UPDATE $bind ARRAY!
     *
     * @param $table
     * @param $where
     * @param $and
     * @param array $bind
     * @param int $limit
     */
    public function delete1($table, $where, $and, $bind = array())
    {
        $db = self::getInstance();

        $sth = $db->prepare("DELETE FROM $table WHERE $where AND $and");

        foreach ($bind as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();

        $sth->closeCursor();
    }
}