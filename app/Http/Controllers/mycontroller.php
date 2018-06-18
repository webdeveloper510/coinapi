<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mycontroller extends Controller
{
    public function index(){
		error_reporting(0);
		$vol1 = '';
		//$var1 = file_get_contents('https://api.binance.com/api/v1/ticker/24hr');
		$var1 = file_get_contents('https://api.binance.com/api/v1/ticker/price');
		/* $price = 0;
		foreach(json_decode($var1) as $newvar){
			if($newvar->symbol == "BNBBTC"){
				$price = $newvar->price;
			}
		}  */
		$arr1 = json_decode($var1);
		$array_of_symbol = array();
		foreach($arr1 as $ar1){
			$array_of_symbol[] = $ar1->symbol;
		}
		//echo "<pre>";
		//print_r($array_of_symbol); 
		$i = 0;
		foreach($array_of_symbol as $symb){
			/*$var = file_get_contents('https://api.binance.com/api/v1/ticker/24hr?symbol='.$symb);
				$kb[$i] = json_decode($var);
				
				$symbol[$i] = $symb;
				$vol[$i] = number_format((float)($kb[$i]->quoteVolume), 2, '.', '');
				$price[$i] = $kb[$i]->lastPrice;
				$priceChangePercent[$i] = $kb[$i]->priceChangePercent;
				$highPrice[$i] = $kb[$i]->highPrice;
				$lowPrice[$i] = $kb[$i]->lowPrice;
				$i++;*/
				$var = file_get_contents('https://api.binance.com/api/v1/ticker/24hr?symbol='.$symb);
				$kb[$i] = json_decode($var);
				
				$symbol[$i] = $symb;
				$vol[$i] = number_format((float)($kb[$i]->quoteVolume), 2, '.', '');
				$price[$i] = $kb[$i]->lastPrice;
				$priceChangePercent[$i] = $kb[$i]->priceChangePercent;
				$highPrice[$i] = $kb[$i]->highPrice;
				$lowPrice[$i] = $kb[$i]->lowPrice;
				
				$i++; 

			/*if(stripos($symb, 'USDT')){
				$var = file_get_contents('https://api.binance.com/api/v1/ticker/24hr?symbol='.$symb);
				$kb[$i] = json_decode($var);
				
				$symbol[$i] = $symb;
				$vol[$i] = number_format((float)($kb[$i]->quoteVolume), 2, '.', '');
				$price[$i] = $kb[$i]->lastPrice;
				$priceChangePercent[$i] = $kb[$i]->priceChangePercent;
				$highPrice[$i] = $kb[$i]->highPrice;
				$lowPrice[$i] = $kb[$i]->lowPrice;
				$i++;
			}else{
				
			}*/
			
		}
		$data['symbol'] = $symbol;
		$data['vol'] = $vol;
		$data['price'] = $price;
		$data['vol1'] = $vol1;
		$data['priceChangePercent'] = $priceChangePercent;
		$data['highPrice'] = $highPrice;
		$data['lowPrice'] = $lowPrice;
		//echo "<pre>"; print_r($data); die;
		return view('mainview',$data);
		die;
		 //echo "<pre>";
		$arr = json_decode($var);
		//die;
		//print_r($arr); die;
		for($i=0;$i<count($arr);$i++)
		{
			$zrr = json_decode(json_encode($arr), True);
			//$zrr = json_decode($arr[$i]);
			
			
			 /* $symboladd = substr($arr[$i]->symbol, -3);
			 $findsymbol = $symboladd."USDT";
		 //echo in_array($findsymbol, $arr); die;
			foreach($arr as $arr1){
				$symbol = $arr1->symbol;
				$quoteVolume = $arr1->quoteVolume;
			} */
		}
		
		
		//return $zrr;
		//print_r($zrr);

		for($j=0;$j<count($zrr);$j++)
		{  
			$priceChangePercent[] = $zrr[$j]['priceChangePercent'];
			$highPrice[] = $zrr[$j]['highPrice'];
			$lowPrice[] = $zrr[$j]['lowPrice'];
			//$ssymbol = substr($zrr[$j]['symbol'], -3);
			//$sdsymbol = $ssymbol."USDT";
			
			
			
			for($z=0;$z<count($zrr);$z++)
			{
				if(in_array($sdsymbol,$zrr[$z]))
				{
					//$total += $zrr[$z]['lastPrice']*$zrr[$j]['quoteVolume'];
					$vol[] = number_format((float)$zrr[$j]['quoteVolume'], 2, '.', '');
					$vol1 += number_format((float)$zrr[$j]['quoteVolume'], 2, '.', '');
					//$percent = $vol/$tempvol*100;
					$price[] = $zrr[$z]['lastPrice']*$zrr[$j]['lastPrice'];
					$symbol[] = $zrr[$j]['symbol'];
					//echo "<tr><td>".$symbol."</td><td>$".$price."</td><td>".$vol."</td><td></td><tr>";
					break;
					
					
					/* $volume[$zrr[$j]['symbol']] = $zrr[$z]['lastPrice']*$zrr[$j]['quoteVolume'].",".$zrr[$z]['lastPrice']*$zrr[$j]['lastPrice']; */
				}
				
				
				
			}
			
		}
		$data['symbol'] = $symbol;
		$data['vol'] = $vol;
		$data['price'] = $price;
		$data['vol1'] = $vol1;
		$data['priceChangePercent'] = $priceChangePercent;
		$data['highPrice'] = $highPrice;
		$data['lowPrice'] = $lowPrice;
		return view('mainview',$data);
	}
}
