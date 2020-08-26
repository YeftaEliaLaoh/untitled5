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

	print("Pemain = ".$arr->pemain.", Dadu ".$arr->dadu);
	print("\n");
	print("============================================");
	print("\n");
	for ($y = 1; $y <= 1; $y++) {
		print("Giliran lempar dadu :");
		print("\n");
		for ($x = 1; $x <= $arr->pemain; $x++) {
			print("Pemain #$x : nilai(${"nilai_$x"})");
			print("\n");
			for ($z = 1; $z <= $arr->dadu; $z++) {
			${"pemain_$x"}[$z-1] = rand(1,6);
			} 
			print_r(${"pemain_$x"});
			print("\n");
		}
		
		
		print("Setelah evaluasi :");
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
				${"sisa_$x"}[count(${"sisa_$x"})]=1;
				unset(${"pemain_$x"}[$w]);
				}
			}
		}
		
		for ($x = 1; $x <= $arr->pemain; $x++) {
		print("Pemain #$x :");
		print("\n");

		array_merge(${"pemain_$x"}, ${"sisa_$x"});
		
		print_r(${"pemain_$x"});
		print("\n");
		print_r(${"sisa_$x"});
		print("\n");
		print("nilai(${"nilai_$x"})");
		print("\n");
		}
	}	
	print("============================================"); 
}
?>
