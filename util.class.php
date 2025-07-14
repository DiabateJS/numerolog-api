<?php
include "constants.class.php";

class Util {

    /*
PDOStatement::execute, prepare, query
Errors/Exceptions
- PDOException
*/
    static function getNbreDico($nbre){
        return [
               "nbre" => $nbre
           ];
    }
    
    static function queryFromMethodType($type){
        $dico = [
            TypeNbre::$INTIME => Query::$SQL_SELECT_NBRE_INTIME,
            TypeNbre::$REALISATION => Query::$SQL_SELECT_NBRE_REALISATION,
            TypeNbre::$EXPRESSION => Query::$SQL_SELECT_NBRE_EXPRESSION,
            TypeNbre::$HEREDITAIRE => Query::$SQL_SELECT_NBRE_HEREDITAIRE,
            TypeNbre::$ACTIF => Query::$SQL_SELECT_NBRE_ACTIF,
            TypeNbre::$MANQUANT => Query::$SQL_SELECT_NBRE_MANQUANT,
            TypeNbre::$DOMINANT => Query::$SQL_SELECT_NBRE_DOMINANT,
            TypeNbre::$CHEMIN_VIE => Query::$SQL_SELECT_NBRE_CHEMIN_VIE
        ];
        $res = "";
        if (array_key_exists($type, $dico)){
            $res = $dico[$type];
        }
        return $res;
    }
    
    static function allDataQueryFromMethodType($type){
        $dico = [
            TypeNbre::$INTIME => Query::$SQL_SELECT_ALL_NBRE_INTIME,
            TypeNbre::$REALISATION => Query::$SQL_SELECT_ALL_NBRE_REALISATION,
            TypeNbre::$EXPRESSION => Query::$SQL_SELECT_ALL_NBRE_EXPRESSION,
            TypeNbre::$HEREDITAIRE => Query::$SQL_SELECT_ALL_NBRE_HEREDITAIRE,
            TypeNbre::$ACTIF => Query::$SQL_SELECT_ALL_NBRE_ACTIF,
            TypeNbre::$MANQUANT => Query::$SQL_SELECT_ALL_NBRE_MANQUANT,
            TypeNbre::$DOMINANT => Query::$SQL_SELECT_ALL_NBRE_DOMINANT,
            TypeNbre::$CHEMIN_VIE => Query::$SQL_SELECT_ALL_NBRE_CHEMIN_VIE
        ];
        $res = "";
        if (array_key_exists($type, $dico)){
            $res = $dico[$type];
        }
        return $res;
    }

    static function getNbreInterResult($pdo, $nbre, $type){
        $result = new ResultData(false, null, null);
        try{
            $stmt = $pdo->prepare(self::queryFromMethodType($type));
            $stmt->execute(self::getNbreDico($nbre));
            $nbreInter = null;
            if ($stmt->rowCount() == 0){
                $msg = "L interpretation du nbre ".$nbre." n est pas disponible en base";
                $result->setMessage($msg);
            }else{
                $c = $stmt->fetch();
                $nbreInter = new InterNbre($c["nbre"],$c["interpretation"]);
                $result->setData($nbreInter);
            }
            http_response_code(200);
        }catch(Exception $e){
            $result->setError(true);
            $result->setMessage($e->getMessage());
            http_response_code(500);
        }
        return $result;
    }

    static function getAllTypeNbreInterResult($pdo, $type){
        $result = new ResultData(false, null, null);
        try{
            $all = $pdo->query(self::allDataQueryFromMethodType($type))->fetchAll();
            $intersNbre = [];
            foreach($all as $c){
                $interNbre = new InterNbre($c["nbre"],$c["interpretation"]);
                $intersNbre[] = $interNbre;
            }
            $result->setData($intersNbre);
            http_response_code(200);
        }catch(Exception $e){
            echo "Erreur survenue : ".$e->getMessage();
            $result->setError(true);
            $result->setMessage($e->getMessage());
            http_response_code(500);
        }
        return $result;
    }

    static function getCharCode($c){
        $dico = Constants::$TAB_CORRESPONDANCE;
        $res = 0;
        foreach ($dico as $key => $value){
            if ($key == strtoupper($c)){
                $res = $value;
            }
        }
        return $res;  
    }

    static function reductionNum($nbre){
        $res = 0;
        if ($nbre > 0){
            $res = $nbre % 9 == 0 ? 9 : $nbre % 9;
        }
        return $res;
    }

    static function reductionChaine($chaine){
        $res = 0;
        $tab = str_split($chaine);
        foreach($tab as $letter){
            $res += self::getCharCode($letter);
        }
        $res = self::reductionNum($res);
        return $res;
    }

    static function isConsonne($char){
        $res = false;
        if (strlen($char) == 1){ 
            if (strpos(Constants::$CONSONNES, strtoupper($char)) >= 0){
                $res = false;
            }
        }
        return $res;
    }

    static function isVoyelle($char){
        $res = false;
        if (strlen($char) == 1){
            if (strpos(Constants::$VOYELLES, strtoupper($char)) >= 0){
                $res = true;
            }
        }
        return $res;
    }
    
}