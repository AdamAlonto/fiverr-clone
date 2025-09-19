<?php
class Category {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createCategory($category_name) {
        $sql = "INSERT INTO categories (category_name) VALUES (?)";
        return $this->db->executeNonQuery($sql, [$category_name]);
    }

    public function getCategories() {
        $sql = "SELECT * FROM categories";
        return $this->db->executeQuery($sql);
    }

    public function getCategoryById($category_id) {
        $sql = "SELECT * FROM categories WHERE category_id = ?";
        return $this->db->executeQuerySingle($sql, [$category_id]);
    }

    public function updateCategory($category_id, $category_name) {
        $sql = "UPDATE categories SET category_name = ? WHERE category_id = ?";
        return $this->db->executeNonQuery($sql, [$category_name, $category_id]);
    }

    public function deleteCategory($category_id) {
        $sql = "DELETE FROM categories WHERE category_id = ?";
        return $this->db->executeNonQuery($sql, [$category_id]);
    }
}
?>