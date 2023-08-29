<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

try {
    $pdo = new PDO('mysql:dbname=quiz;host=127.0.0.1:3306','root','hurol04',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $datas = $pdo->query("SELECT * FROM systeme")->fetchAll(PDO::FETCH_OBJ);
    $retour['success'] = true;
    $retour['message'] = 'tout es bon';
    $retour['results']['quiz'] = $datas;
    $retour['results']['nbr_quiz'] = count($datas);
} catch (Exception $e) {
    $retour['success'] = false;
    $retour['message'] = 'impossible de se connecter';
};


echo json_encode($retour)
?>
    