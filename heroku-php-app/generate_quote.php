<?php
require "quolib/quotr.php";

// (B) SET QUOTATION DATA
$quotr->set("company", [
  "http://localhost/quotr-main/logo.png",  // Chemin de votre logo
  "D:/http/quotr-main/logo.png",  // Chemin de votre logo
  "Votre Entreprise",
  "Adresse de votre entreprise",
  "Téléphone: xxx-xxx-xxx | Fax: xxx-xxx-xxx",
  "https://votre-site-web.com",
  "contact@votre-site-web.com"
]);

// (B2) QUOTATIONHEADER
$quotr->set("head", [
  ["QUOTATION #", "CB-123-456"],
  ["Valid From", date('Y-m-d')],
  ["Valid Till", date('Y-m-d', strtotime('+30 days'))]
]);

// (B3) CUSTOMER
$quotr->set("customer", [
  $_POST['customerName'],
  "Adresse du client",
  "Ville, État, Code Postal",
  "Tel, " . $_POST['mailCustomer']
]);

// (B4) ITEMS - SET ALL AT ONCE
$items = [
  ["Model", $_POST['model'], 1, "", ""],
  ["Elevation", $_POST['elevation'], 1, "", ""]
];
$quotr->set("items", $items);

// (B5) TOTALS
$quotr->set("totals", [
  ["SUB-TOTAL", "$100.00"],
  ["DISCOUNT 10%", "-$10.00"],
  ["GRAND TOTAL", "$90.00"]
]);

// (B6) NOTES, IF ANY
$quotr->set("notes", [
  "Cette citation n'est pas une facture et n'est pas contractuelle.",
  "VOS TERMES ET CONDITIONS ICI."
]);

// (B7) INCLUDE SIGN-OFF ACCEPTANCE
$quotr->set("accept", true);

// (C) OUTPUT
$quotr->template("apple");
$quotr->outputHTML();
?>
