<?php
include "database.config.class.php";
include "resultdata.class.php";
include "queries.class.php";
include "internbre.class.php";
include "util.class.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

$ERROR_400_MSG = "Erreur de formulation de la requete : Nbre de parametres insuffisants";

class Method {
    static $NBRE_INTER = "getNbreInter";
    static $ALL_NBRE_INTER = "getAllNbreInter";
}

class TypeNbre {
    static $INTIME = "nbre_intime";
    static $REALISATION = "nbre_realisation";
    static $EXPRESSION = "nbre_expression";
    static $HEREDITAIRE = "nbre_hereditaire";
    static $ACTIF = "nbre_actif";
    static $MANQUANT = "nbre_manquant";
    static $DOMINANT = "nbre_dominant";
    static $CHEMIN_VIE = "nbre_chemin_vie";
}


function getNbreDico($nbre){
    return [
           "nbre" => $nbre
       ];
}

function queryFromMethodType($type){
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

function allDataQueryFromMethodType($type){
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

/*
PDOStatement::execute, prepare, query
Errors/Exceptions
- PDOException
*/

function getNbreInterResult($pdo, $nbre, $type){
    $result = new ResultData(false, null, null);
    try{
        $stmt = $pdo->prepare(queryFromMethodType($type));
        $stmt->execute(getNbreDico($nbre));
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
        echo "Erreur survenue : ".$e->getMessage();
        $result->setError(true);
        $result->setMessage($e->getMessage());
        http_response_code(500);
    }
    return $result;
}

function getAllTypeNbreInterResult($pdo, $type){
    $result = new ResultData(false, null, null);
    try{
        $all = $pdo->query(allDataQueryFromMethodType($type))->fetchAll();
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

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $method= $_GET["method"];
    $params= $_GET["params"];
    $pdo = new PDO(DatabaseConfig::getConStr(), DatabaseConfig::$USER, DatabaseConfig::$PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Pour la gestion des exceptions
    $tab = explode(";",$params);
    if ($method == Method::$NBRE_INTER){
        $result = new ResultData(false, null, null);
        if (count($tab) > 1){
            $type = strtolower($tab[0]);
            $nbre = $tab[1];
            $result = getNbreInterResult($pdo, $nbre, $type);
        }else{
            $result->setError(true);
            $result->setMessage($ERROR_400_MSG);
            http_response_code(400);
        }
        echo json_encode($result);
    }
    if ($method == Method::$ALL_NBRE_INTER){
        $result = new ResultData(false, null, null);
        if (count($tab) > 0){
            $type = strtolower($tab[0]);
            $result = getAllTypeNbreInterResult($pdo, $type);
            echo json_encode($result->getData());
        }else{
            $result->setMessage($ERROR_400_MSG);
            http_response_code(400);
            echo json_encode($result);
        }
    } 
}    
?>