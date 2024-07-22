<?php
require "quolib/quotr.php";

// (B) SET QUOTATION DATA
// (B2) QUOTATIONHEADER
$quotr->set("head", [
  ["QUOTATION #", "CB-123-456"],
  ["Valid From", date('Y-m-d')],
  ["Valid Till", date('Y-m-d', strtotime('+30 days'))]
]);

// (B3) CUSTOMER
$quotr->set("customer", [
  "Customer Name",
  "Street Address",
  "City, State, Zip",
  "Tel, Email"
]);

// (B4) ITEMS - SET ALL AT ONCE
$items = [
  ["Rubber Hose", "5m long rubber hose", 3, "$5.50", "$16.50"],
  ["Rubber Duck", "Good bathtub companion", 8, "$4.20", "$33.60"],
  ["Rubber Band", "", 10, "$0.10", "$1.00"],
  ["Rubber Stamp", "", 3, "$12.30", "$36.90"],
  ["Rubber Shoe", "For slipping, not for running", 1, "$20.00", "$20.00"]
];
$quotr->set("items", $items);

// (B5) TOTALS
$quotr->set("totals", [
  ["SUB-TOTAL", "$108.00"],
  ["DISCOUNT 10%", "-$10.80"],
  ["GRAND TOTAL", "$97.20"]
]);

// (B6) NOTES, IF ANY
$quotr->set("notes", [
  "This quotation is not an invoice and it is non-contractual.",
  "YOUR TERMS AND CONDITIONS HERE."
]);

// (B7) INCLUDE SIGN-OFF ACCEPTANCE
$quotr->set("accept", true);

// (C) OUTPUT
$quotr->template("apple");
$quotr->outputPDF(2, "QUOTATION.pdf");
?>
