<?php

class DB
{
   // $tns = "quizzapp_high"; 
    //$user = "quizzteam3"; 
    //$password = "QuizzApp2462"; 


    private static function connect()
    {
        //$pdo = new PDO("oci:dbname=".$tns, $user, $password);
        %pdo = new Pdo("mysql:host=localhost;dbname=quizzteam3","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public static function query($query, $params = array())
    {
        $stmt = self::connect()->prepare($query);
        $stmt->execute($params);
        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }
    }
}
?>