<?php
   $jsonData = file_get_contents('api/stock.json');
   $stockArray = json_decode($jsonData, true);
   if (is_array($stockArray) && isset($stockArray[0]) && is_array($stockArray[0]) && count($stockArray[0]) >= 2) {
       $pendingNumbers = $stockArray[0][0];
       $availableNumbers = $stockArray[0][1];
   } else {
       $pendingNumbers = '0';
       $availableNumbers = '0';
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Robux Stock</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="sora.css"/>
      <link rel="stylesheet" href="animate.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="icon.png">
   </head>
   <body>
      <div class="stock-title">R$ Stock</div>
      <div class="status-container">
         <div class="status">Pending <span id="pending-numbers"><?php echo $pendingNumbers; ?></span></div>
         <div class="status">Available <span id="available-numbers"><?php echo $availableNumbers; ?></span></div>
      </div>
      <div class="description">The stock is auto updated every minute</div>
      <script src="script.js"></script>
   </body>
</html>