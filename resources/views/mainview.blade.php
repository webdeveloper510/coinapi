<?php 

?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200i,300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet"> 
<style>
.outer_table {
    width: 100%;
    margin: 0 auto;
    background: #f1f1f175;
}
.inner_table {
    width: 90%;
    margin: 0 auto;
    border-right: 1px solid #ccc;
    border-left: 1px solid #ccc;
    margin-top: 35px;
}
pre {
    display: block;
    padding: 9.5px;
    margin: 11px 0 10px;
    font-size: 25px;
    line-height: 1.42857143;
    color: #333;
    word-break: break-all;
    word-wrap: break-word;
    background-color: #f5f5f5;
    border: 1px solid #ccc;
    border-radius: 4px;
    text-align: center;
}
</style>

<div class="outer_table">
  <div class="inner_table">
<table class="table"  cellspacing="0" width="100%" style="visibility: visible;width: 100%;">
    <thead>
<tr role="row">
        <th  class="right aligned sorting" style="width: 153.45px; cursor: pointer;">Market</th>
        <th  class="right aligned sorting" style="width: 153.45px; cursor: pointer;">Price</th>
        <th  class="right aligned sorting" style="width: 153.45px; cursor: pointer;">24h Change</th>
        <th  class="right aligned sorting" style="width: 153.45px; cursor: pointer;">24h High</th>
        <th  class="right aligned sorting" style="width: 153.45px; cursor: pointer;">24h Low</th>
        <th  class="right aligned sorting" style="width: 153.45px; cursor: pointer;">24h Volume</th>
        
      </tr>
    </thead>
    <tbody class="tbody">
      
	  
	   <?php 
	//echo $vol1;
	for($d=0;$d<count($vol);$d++){
		$percent = ($vol[$d]/$vol1)*100;
		$per = number_format((float)$percent, 2, '.', '');
		echo "<tr><td><a href='https://www.binance.com/trade.html?symbol=".$symbol[$d]."'>".$symbol[$d]."</a></td><td>$".$price[$d]."</td><td>".number_format((float)$priceChangePercent[$d], 2, '.', '')."%</td><td>".$highPrice[$d]."</td><td>".$lowPrice[$d]."</td><td>".$vol[$d]."</td><tr>";
	}

  ?>
   </tbody>
  </table>