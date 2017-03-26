<?php

/**
 * Created by PhpStorm.
 * User: jwood
 * Date: 3/26/2017
 * Time: 11:52 AM
 */
class Grade
{
    public static function find($arr = array()){
        global $db;

        $query = "SELECT id, scale, grade, description FROM tblGrades ";
        if(empty ($arr)) {
            $st = $db->prepare($query);
        }
        else if ($arr['id']) {
            $st = $db->prepare($query . " WHERE id=:id");
        }
        else if ($arr['scale']) {
            $st = $db->prepare($query . " WHERE scale=:scale");
        }
        else {
            throw new Exception("Unsupported property");
        }

        $st->execute($arr);

        // Returns an array of Category objects:
        return $st->fetchAll(PDO::FETCH_CLASS, "Grade");

    }
}