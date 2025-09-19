<?php  
require_once 'E:/xampp/htdocs/fiverr_clone/freelancer/classes/Database.php';
require_once 'E:/xampp/htdocs/fiverr_clone/freelancer/classes/Offer.php';
require_once 'E:/xampp/htdocs/fiverr_clone/freelancer/classes/Proposal.php';
require_once 'E:/xampp/htdocs/fiverr_clone/freelancer/classes/User.php';
require_once 'E:/xampp/htdocs/fiverr_clone/freelancer/classes/Category.php';
require_once 'E:/xampp/htdocs/fiverr_clone/freelancer/classes/Subcategory.php';

$databaseObj= new Database();
$offerObj = new Offer();
$proposalObj = new Proposal();
$userObj = new User();
$categoryObj = new Category();
$subcategoryObj = new Subcategory();

$userObj->startSession();
?>