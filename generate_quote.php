<?php
require "quolib/quotr.php";

// Récupérer les données envoyées depuis le formulaire
$mailCustomer = isset($_POST['mailCustomer']) ? $_POST['mailCustomer'] : '';
$customerName = isset($_POST['customerName']) ? $_POST['customerName'] : '';
$salesRep = isset($_POST['salesRep']) ? $_POST['salesRep'] : '';
$model = isset($_POST['model']) ? $_POST['model'] : '';
$elevation = isset($_POST['elevation']) ? $_POST['elevation'] : '';

// (B) SET QUOTATION DATA
// (B2) QUOTATION HEADER
$quotr->set("head", [
  ["QUOTATION #", "CB-123-456"],
  ["Valid From", date('Y-m-d')],
  ["Valid Till", date('Y-m-d', strtotime('+30 days'))]
]);

// (B3) CUSTOMER
$quotr->set("customer", [
  $customerName,
  "Street Address",
  "City, State, Zip",
  "Tel, Email"
]);

// (B4) ITEMS - SET ALL AT ONCE
$items = [
  ["Model", $model, 1, "-", "-"],
  ["Elevation", $elevation, 1, "-", "-"]
];
$quotr->set("items", $items);

// (B5) TOTALS
$quotr->set("totals", [
  ["SUB-TOTAL", "-"],
  ["DISCOUNT 10%", "-"],
  ["GRAND TOTAL", "-"]
]);

// (B6) NOTES, IF ANY
$quotr->set("notes", [
  "This quotation is not an invoice and it is non-contractual.",
  "YOUR TERMS AND CONDITIONS HERE."
]);

// (B7) INCLUDE SIGN-OFF ACCEPTANCE
$quotr->set("accept", true);

// (C) OUTPUT
$quotr->template("simple");
$quotr->outputHTML();
?>
