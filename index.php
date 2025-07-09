<?php
include "database.config.class.php";
include "resultdata.class.php";
include "queries.class.php";
include "internbre.class.php";
include "util.class.php";

include "method.constants.class.php";
include "typenbre.constants.class.php";
include "constants.class.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');


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
            $result = Util::getNbreInterResult($pdo, $nbre, $type);
        }else{
            $result->setError(true);
            $result->setMessage(Constants::$ERROR_400_MSG);
            http_response_code(400);
        }
        echo json_encode($result);
    }
    if ($method == Method::$ALL_NBRE_INTER){
        $result = new ResultData(false, null, null);
        if (count($tab) > 0){
            $type = strtolower($tab[0]);
            $result = Util::getAllTypeNbreInterResult($pdo, $type);
            echo json_encode($result->getData());
        }else{
            $result->setMessage(Constants::$ERROR_400_MSG);
            http_response_code(400);
            echo json_encode($result);
        }
    } 
}    
?>