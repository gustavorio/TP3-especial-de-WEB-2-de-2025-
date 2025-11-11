<?php

require_once "./app/models/Model.php";

class GamesModel extends Model {

    public function getGameById($id) {
        $query = $this->db->prepare('SELECT * FROM juegos WHERE juegoId = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);   
    }

}