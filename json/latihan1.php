<?php

try {
        $dbh = new PDO('mysql:host=localhost;dbname=tugas_iap', 'root', '');
        $db = $dbh->prepare('SELECT * FROM mahasiswa');
        $db->execute();
        $mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);
    
        header('Content-Type: application/json');
        echo json_encode($mahasiswa);
    } catch (PDOException $e) {
        echo 'koneksi gagal: ' . $e->getMessage();
    }
    
?>