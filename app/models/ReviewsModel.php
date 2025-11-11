<?php
require_once "./app/models/Model.php";

class ReviewsModel extends Model {
    public function getReviews() {
        $query = $this->db->prepare("SELECT * FROM reviews");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getReviewById($id) {
        $query = $this->db->prepare("SELECT * FROM reviews WHERE reviewId = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    public function addReview($descripcion, $puntuacion, $usuario, $juegoId) {
        $query = $this->db->prepare("INSERT INTO reviews (descripcion, puntuacion, usuario, juegoId) VALUE (?, ?, ?, ?)");
        $query->execute([$descripcion, $puntuacion, $usuario, $juegoId]);
    }

    public function updateReview($descripcion, $puntuacion, $usuario, $juegoId, $id) {
        $query = $this->db->prepare("UPDATE reviews SET descripcion = ?, puntuacion = ?, usuario = ?, juegoId = ? WHERE reviewId = ?");
        $query->execute([$descripcion, $puntuacion, $usuario, $juegoId, $id]);
    }

    public function deleteReview($id) {
        $query = $this->db->prepare("DELETE FROM reviews WHERE reviewId = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}