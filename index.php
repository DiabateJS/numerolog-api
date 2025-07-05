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

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $method= $_GET["method"];
    $params= $_GET["params"];
    $pdo = new PDO(DatabaseConfig::getConStr(), DatabaseConfig::$USER, DatabaseConfig::$PASSWORD);
    $tab = explode(";",$params);
    if ($method == "getNbreInter"){
        if (count($tab) == 2){
            $type = $tab[0];
            $nbre = $tab[1];
            if (strtolower($type) == "nbre_intime"){
                $result = new ResultData(false, null, null);
                $nbreIntimeDico = [
                    "nbre" => $nbre
                ];
                $stmt = $pdo->prepare(Query::$SQL_SELECT_NBRE_INTIME);
                $stmt->execute($nbreIntimeDico);
                $nbreIntimeInter = null;
                if ($stmt->rowCount() == 1){
                    $c = $stmt->fetch();
                    $nbreIntimeInter = new InterNbre($c["nbre"],$c["interpretation"]);
                    $result->setData($nbreIntimeInter);
                    http_response_code(200);
                }
            }
            if (strtolower($type) == "nbre_realisation"){
                $result = new ResultData(false, null, null);
                $nbreRealisationDico = [
                    "nbre" => $nbre
                ];
                $stmt = $pdo->prepare(Query::$SQL_SELECT_NBRE_REALISATION);
                $stmt->execute($nbreRealisationDico);
                $nbreRealisationInter = null;
                if ($stmt->rowCount() == 1){
                    $c = $stmt->fetch();
                    $nbreRealisationInter = new InterNbre($c["nbre"],$c["interpretation"]);
                    $result->setData($nbreRealisationInter);
                    http_response_code(200);
                }
            }
            if (strtolower($type) == "nbre_expression"){
                $result = new ResultData(false, null, null);
                $nbreExpressionDico = [
                    "nbre" => $nbre
                ];
                $stmt = $pdo->prepare(Query::$SQL_SELECT_NBRE_EXPRESSION);
                $stmt->execute($nbreExpressionDico);
                $nbreExpressionInter = null;
                if ($stmt->rowCount() == 1){
                    $c = $stmt->fetch();
                    $nbreExpressionInter = new InterNbre($c["nbre"],$c["interpretation"]);
                    $result->setData($nbreExpressionInter);
                    http_response_code(200);
                }
            }
            if (strtolower($type) == "nbre_hereditaire"){
                $result = new ResultData(false, null, null);
                $nbreHereditaireDico = [
                    "nbre" => $nbre
                ];
                $stmt = $pdo->prepare(Query::$SQL_SELECT_NBRE_HEREDITAIRE);
                $stmt->execute($nbreHereditaireDico);
                $nbreHereditaireInter = null;
                if ($stmt->rowCount() == 1){
                    $c = $stmt->fetch();
                    $nbreHereditaireInter = new InterNbre($c["nbre"],$c["interpretation"]);
                    $result->setData($nbreHereditaireInter);
                    http_response_code(200);
                }
            }
            if (strtolower($type) == "nbre_actif"){
                $result = new ResultData(false, null, null);
                $nbreActifDico = [
                    "nbre" => $nbre
                ];
                $stmt = $pdo->prepare(Query::$SQL_SELECT_NBRE_ACTIF);
                $stmt->execute($nbreActifDico);
                $nbreActifInter = null;
                if ($stmt->rowCount() == 1){
                    $c = $stmt->fetch();
                    $nbreActifInter = new InterNbre($c["nbre"],$c["interpretation"]);
                    $result->setData($nbreActifInter);
                    http_response_code(200);
                }
            }
            if (strtolower($type) == "nbre_manquant"){
                $result = new ResultData(false, null, null);
                $nbreManquantDico = [
                    "nbre" => $nbre
                ];
                $stmt = $pdo->prepare(Query::$SQL_SELECT_NBRE_MANQUANT);
                $stmt->execute($nbreManquantDico);
                $nbreManquantInter = null;
                if ($stmt->rowCount() == 1){
                    $c = $stmt->fetch();
                    $nbreManquantInter = new InterNbre($c["nbre"],$c["interpretation"]);
                    $result->setData($nbreManquantInter);
                    http_response_code(200);
                }
            }
            if (strtolower($type) == "nbre_dominant"){
                $result = new ResultData(false, null, null);
                $nbreDominantDico = [
                    "nbre" => $nbre
                ];
                $stmt = $pdo->prepare(Query::$SQL_SELECT_NBRE_DOMINANT);
                $stmt->execute($nbreDominantDico);
                $nbreDominantInter = null;
                if ($stmt->rowCount() == 1){
                    $c = $stmt->fetch();
                    $nbreDominantInter = new InterNbre($c["nbre"],$c["interpretation"]);
                    $result->setData($nbreDominantInter);
                    http_response_code(200);
                }
            }
            if (strtolower($type) == "nbre_chemin_vie"){
                $result = new ResultData(false, null, null);
                $nbreCheminVieDico = [
                    "nbre" => $nbre
                ];
                $stmt = $pdo->prepare(Query::$SQL_SELECT_NBRE_CHEMIN_VIE);
                $stmt->execute($nbreCheminVieDico);
                $nbreCheminVieInter = null;
                if ($stmt->rowCount() == 1){
                    $c = $stmt->fetch();
                    $nbreCheminVieInter = new InterNbre($c["nbre"],$c["interpretation"]);
                    $result->setData($nbreCheminVieInter);
                    http_response_code(200);
                }
            }
        }else{
            $result->setMessage("Interpretation du nombre ".$nbre." introuvable");
            http_response_code(400);
        }
        echo json_encode($result);
    }
    if ($method == "getAllNbreInter"){
        $result = new ResultData(false, null, null);
        if (count($tab) == 1){
            $type = $tab[0];
            if ($type == "nbre_intime"){
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
            if ($type == "nbre_realisation"){
                $all = $pdo->query(Query::$SQL_SELECT_ALL_NBRE_REALISATION)->fetchAll();
                $nbreRealisations = [];
                foreach($all as $c){
                    $nbreRealisation = new InterNbre($c["nbre"],$c["interpretation"]);
                    $nbreRealisations[] = $nbreRealisation;
                }
                $result->setData($nbreRealisations);
                http_response_code(200);
                echo json_encode($nbreRealisations);
            }
            if ($type == "nbre_expression"){
                $all = $pdo->query(Query::$SQL_SELECT_ALL_NBRE_EXPRESSION)->fetchAll();
                $nbreExpressions = [];
                foreach($all as $c){
                    $nbreExpression = new InterNbre($c["nbre"],$c["interpretation"]);
                    $nbreExpressions[] = $nbreExpression;
                }
                $result->setData($nbreExpressions);
                http_response_code(200);
                echo json_encode($nbreExpressions);
            }
            if ($type == "nbre_hereditaire"){
                $all = $pdo->query(Query::$SQL_SELECT_ALL_NBRE_HEREDITAIRE)->fetchAll();
                $nbreHereditaires = [];
                foreach($all as $c){
                    $nbreHereditaire = new InterNbre($c["nbre"],$c["interpretation"]);
                    $nbreHereditaires[] = $nbreHereditaire;
                }
                $result->setData($nbreHereditaires);
                http_response_code(200);
                echo json_encode($nbreHereditaires);
            }
            if ($type == "nbre_actif"){
                $all = $pdo->query(Query::$SQL_SELECT_ALL_NBRE_ACTIF)->fetchAll();
                $nbreActifs = [];
                foreach($all as $c){
                    $nbreActif = new InterNbre($c["nbre"],$c["interpretation"]);
                    $nbreActifs[] = $nbreActif;
                }
                $result->setData($nbreActifs);
                http_response_code(200);
                echo json_encode($nbreActifs);
            }
            if ($type == "nbre_manquant"){
                $all = $pdo->query(Query::$SQL_SELECT_ALL_NBRE_MANQUANT)->fetchAll();
                $nbreManquants = [];
                foreach($all as $c){
                    $nbreManquant = new InterNbre($c["nbre"],$c["interpretation"]);
                    $nbreManquants[] = $nbreManquant;
                }
                $result->setData($nbreManquants);
                http_response_code(200);
                echo json_encode($nbreManquants);
            }
            if ($type == "nbre_dominant"){
                $all = $pdo->query(Query::$SQL_SELECT_ALL_NBRE_DOMINANT)->fetchAll();
                $nbreDominants = [];
                foreach($all as $c){
                    $nbreDominant = new InterNbre($c["nbre"],$c["interpretation"]);
                    $nbreDominants[] = $nbreDominant;
                }
                $result->setData($nbreDominants);
                http_response_code(200);
                echo json_encode($nbreDominants);
            }
            if ($type == "nbre_chemin_vie"){
                $all = $pdo->query(Query::$SQL_SELECT_ALL_NBRE_CHEMIN_VIE)->fetchAll();
                $nbreCheminVies = [];
                foreach($all as $c){
                    $nbreCheminVie = new InterNbre($c["nbre"],$c["interpretation"]);
                    $nbreCheminVies[] = $nbreCheminVie;
                }
                $result->setData($nbreCheminVies);
                http_response_code(200);
                echo json_encode($nbreCheminVies);
            }
        }else{
            $result->setMessage("Interpretation du nombre : parametres incorrectes");
            http_response_code(400);
            echo json_encode($result);
        }
    } 
}    
?>