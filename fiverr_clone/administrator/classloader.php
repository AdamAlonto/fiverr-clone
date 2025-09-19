<?php  
require_once 'E:/xampp/htdocs/fiverr_clone/administrator/classes/Database.php';
require_once 'E:/xampp/htdocs/fiverr_clone/administrator/classes/Offer.php';
require_once 'E:/xampp/htdocs/fiverr_clone/administrator/classes/Proposal.php';
require_once 'E:/xampp/htdocs/fiverr_clone/administrator/classes/User.php';
require_once 'E:/xampp/htdocs/fiverr_clone/administrator/classes/Category.php';
require_once 'E:/xampp/htdocs/fiverr_clone/administrator/classes/Subcategory.php';

$databaseObj= new Database();
$offerObj = new Offer();
$proposalObj = new Proposal();
$userObj = new User();
$categoryObj = new Category();
$subcategoryObj = new Subcategory();


$userObj->startSession();
?>