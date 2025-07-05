<?php
include "database.config.class.php";
include "resultdata.class.php";
include "queries.class.php";
include "internbre.class.php";
include "util.class.php";
include "categorie.class.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $method= $_GET["method"];
    $params= $_GET["params"];
    $pdo = new PDO(DatabaseConfig::getConStr(), DatabaseConfig::$USER, DatabaseConfig::$PASSWORD);
    if ($method == "getNbreInter"){
        $tab = explode(";",$params);
        if (count($tab) == 2){
            $type = $tab[0];
            $nbre = $tab[1]; 
            if (strtolower($type) == "nbre_intime"){
                $result = new ResultData(false, null, null);
                $nbreInterDico = [
                    "nbre" => $nbre
                ];
                $stmt = $pdo->prepare(Query::$SQL_SELECT_NBRE_INTIME);
                $stmt->execute($nbreInterDico);
                $nbreIntimeInter = null;
                if ($stmt->rowCount() == 1){
                    $c = $stmt->fetch();
                    $nbreIntimeInter = new InterNbre($c["nbre"],$c["interpretation"]);
                    $result->setData($nbreIntimeInter);
                    http_response_code(200);
                }
                echo json_encode($result);
            }
        }else{
            $result->setMessage("Interpretation du nombre ".$nbre." introuvable");
            http_response_code(400);
        }
    }
    if ($method == "getAllNbreInter"){
        $result = new ResultData(false, null, null);
        $all = $pdo->query(Query::$SQL_SELECT_ALL_NBRE_INTIME)->fetchAll();
        $nbreIntimes = [];
        foreach($all as $c){
            $nbreIntime = new InterNbre($c["nbre"],$c["interpretation"]);
            $nbreIntimes[] = $nbreIntime;
        }
        $result->setData($nbreIntimes);
        http_response_code(200);
        echo json_encode($nbreIntimes);
    } 
}    
?>