<?php
class Subcategory {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createSubcategory($category_id, $subcategory_name) {
        $sql = "INSERT INTO subcategories (category_id, subcategory_name) VALUES (?, ?)";
        return $this->db->executeNonQuery($sql, [$category_id, $subcategory_name]);
    }

    public function getSubcategories() {
        $sql = "SELECT * FROM subcategories";
        return $this->db->executeQuery($sql);
    }

    public function getSubcategoriesByCategoryId($category_id) {
        $sql = "SELECT * FROM subcategories WHERE category_id = ?";
        return $this->db->executeQuery($sql, [$category_id]);
    }

    public function getSubcategoryById($subcategory_id) {
        $sql = "SELECT * FROM subcategories WHERE subcategory_id = ?";
        return $this->db->executeQuerySingle($sql, [$subcategory_id]);
    }

    public function updateSubcategory($subcategory_id, $category_id, $subcategory_name) {
        $sql = "UPDATE subcategories SET category_id = ?, subcategory_name = ? WHERE subcategory_id = ?";
        return $this->db->executeNonQuery($sql, [$category_id, $subcategory_name, $subcategory_id]);
    }

    public function deleteSubcategory($subcategory_id) {
        $sql = "DELETE FROM subcategories WHERE subcategory_id = ?";
        return $this->db->executeNonQuery($sql, [$subcategory_id]);
    }
}
?>