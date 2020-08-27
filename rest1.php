<?php
$arr = json_decode(file_get_contents("php://input"));
if (empty($arr)){ 
	exit("Data empty.");
} else {
	for ($x = 1; $x <= $arr->pemain; $x++) {
	 ${"pemain_$x"} = array();
	}
	
	for ($x = 1; $x <= $arr->pemain; $x++) {
	 ${"nilai_$x"} = 0;
	}
	
	for ($x = 1; $x <= $arr->pemain; $x++) {
	 ${"sisa_$x"} = array();
	}
	
	$c = array();
	$valid = true;
	$dadu =0;
	print("Pemain = ".$arr->pemain.", Dadu ".$arr->dadu);
	print("\n");
	print("============================================");
	print("\n");
	//for ($y = 1; $y <= 3; $y++) {
	$y = 1;
	while($valid){
		print("Giliran lempar dadu ke : $y");
		print("\n");
		
		for ($x = 1; $x <= $arr->pemain; $x++) {
			if(count(${"pemain_$x"}) == 0 && $c[x] == 0)
			{
			$dadu = $arr->dadu;
			}
			else
			{
			$dadu = count(${"pemain_$x"});
			}
			print("Pemain #$x : nilai(${"nilai_$x"})");
			print("\n");
			for ($z = 1; $z <= $dadu; $z++) {
			${"pemain_$x"}[$z-1] = rand(1,6);
			} 
			print_r(${"pemain_$x"});
			print("\n");
		}
		
		print("Setelah evaluasi ke : $y");
		print("\n");
		for ($x = 1; $x <= $arr->pemain; $x++) {
			for ($w = 0; $w <= count(${"pemain_$x"}); $w++) {
				if(${"pemain_$x"}[$w]==6)
				{
				 unset(${"pemain_$x"}[$w]);
				 ${"nilai_$x"}+=1;
				}
			}
		}
		
		for ($x = 1; $x <= $arr->pemain; $x++) {
			for ($w = 0; $w <= count(${"pemain_$x"}); $w++) {
			if(${"pemain_$x"}[$w]==1)
				{
				$v = $x+1;
				if($x == $arr->pemain)
				{
				${"sisa_1"}[count(${"sisa_1"})] = 1;
				unset(${"pemain_$x"}[$w]);
				}
				else
				{
				${"sisa_$v"}[count(${"sisa_$v"})] = 1;
				unset(${"pemain_$x"}[$w]);
				}
				}
			}
		}
		
		for ($x = 1; $x <= $arr->pemain; $x++) {
		print("Pemain #$x : nilai(${"nilai_$x"})");
		print("\n");
		
		//$a =${"pemain_$x"};
		//$b =${"sisa_$x"};
		${"pemain_$x"} = array_merge(${"pemain_$x"}, ${"sisa_$x"});
		print_r(${"pemain_$x"});
		print("\n");
		
		if(count(${"pemain_$x"})>0)
		{
		$c[$x-1] = 1;
		}
		else
		{
		$c[$x-1] = 0;
		}	
		
		reset(${"sisa_$x"});
		
		print_r($c);
		print("\n");
		
		}
		
		print(array_count_values($c)[1]);
		print("\n");
		
		if(array_count_values($c)[1]<=1)
		{
		$valid= true;
		}
		else
		{
		$valid= false;	
		}
		$y++;
	}	
	print("============================================"); 
}
?>
