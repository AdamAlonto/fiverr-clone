<?php  
require_once 'E:/xampp/htdocs/fiverr_clone/client/classes/Database.php';
require_once 'E:/xampp/htdocs/fiverr_clone/client/classes/Offer.php';
require_once 'E:/xampp/htdocs/fiverr_clone/client/classes/Proposal.php';
require_once 'E:/xampp/htdocs/fiverr_clone/client/classes/User.php';
require_once 'E:/xampp/htdocs/fiverr_clone/client/classes/Category.php';
require_once 'E:/xampp/htdocs/fiverr_clone/client/classes/Subcategory.php';

$databaseObj= new Database();
$offerObj = new Offer();
$proposalObj = new Proposal();
$userObj = new User();
$categoryObj = new Category();
$subcategoryObj = new Subcategory();

$userObj->startSession();
?>