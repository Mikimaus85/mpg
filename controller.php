<?php
session_start();
require_once __DIR__ . '/dbcon.php';

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!in_array($_POST['action'],['delete', 'view', 'search'])) {
        $values = [
            'name' => $_POST['name'],
            'vorname' => $_POST['vorname'],
            'plz' => $_POST['plz'],
            'telefon' => $_POST['telefon'],
            'email' => $_POST['email'],
            'betreff' => $_POST['betreff'],
            'text' => $_POST['text']
        ];

        if ($values['name'] == "" || $values['vorname'] == "" || $values['email'] == "" || $values['betreff'] == "" || $values['text'] == "") {
                // echo 'Bitte alle Pflichtfelder ausfüllen!';
            }
        }
       
        switch ($_POST['action']) {

            case 'create':
                $sqlcommand = "INSERT INTO `contactlist` (`name`, `vorname`, `plz`, `telefon`, `email`, `betreff`, `text`) VALUES (:name, :vorname, :plz, :telefon, :email, :betreff, :text);";
                unset($_SESSION['search']);
                $_SESSION['message'] = "Eintrag erfolgreich angelegt!";
                $path = 'database.php';
                break;
                
            case 'edit':
                $values['id'] = $_POST['id'];
                $sqlcommand = "UPDATE `contactlist` SET `name` = :name, `vorname` = :vorname, `plz` = :plz, `telefon` = :telefon, `email` = :email, `betreff` = :betreff, `text` = :text WHERE `id` = :id;";
                $_SESSION['message'] = "Ändern des Eintrags erfolgreich übernommen!";
                $path = 'database.php';
                break;

            case 'delete':
                $values['id'] = $_POST['id'];
                $sqlcommand = "DELETE FROM `contactlist` WHERE `id` = :id;";
                $_SESSION['message'] = "Eintrag wurde erfolgreich gelöscht!";
                $path = 'database.php';
                break;

            case 'view':
                $values['id'] = $_POST['id'];
                $sqlcommand = "SELECT * FROM `contactlist` WHERE `id` = :id;";
                $_SESSION['message'] = "Ihr gewünschter Eintrag im Detail!";
                $path = 'view-edit.php';
                break;

            case 'search':
                $search = $_POST['search'];
                $sqlcommand = "SELECT * FROM contactlist WHERE id LIKE '%$search%' OR name LIKE '%$search%' OR plz LIKE '%$search%'";
                $_SESSION['message'] = "Das sind die gefundenen Datensätze!";
                $query = $connect->prepare($sqlcommand);
                $result = $query->execute($values);
                $values = $query->fetchAll();
                if(count($values) > 0){
                    $_SESSION['message'] = "Das sind die gefundenen Datensätze!";
                }else{
                    $_SESSION['message'] = "Es wurden keine Datensätze gefunden!";
                }
                $_SESSION['search'] = $values;
                header("Location: database.php");
                exit(0);
            }

        try{
            $query = $connect->prepare($sqlcommand);
            $result = $query->execute($values);
            $_SESSION['result'] = $query->fetchAll();
            header("Location: $path");
            exit(0);
        }catch(PDOException $e) {
            echo $e;
        }
    }
?>