<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<?php
    function increment(&$array): array
    {
       if(empty($array)){
           return [];
       }
       for($i = sizeof($array)-1;$i>0;$i--){
            if($array[$i] == 9){
               $array[$i] = 0;
               continue;
            }
            if($array[$i]!=9){
                $array[$i] += 1;
                return $array;
            }
       }
       return $array;
   }
   
   function FizzBuzz(int $number): void
   {
       if($number%3 == 0 and $number%5 == 0){
           echo "FizzBuzz";
       }elseif($number%3 == 0){
           echo "Fizz";
       }elseif($number%5 == 0){
           echo "Buzz";
       }else{
            echo $number;
       }
   }

?>
</body>
</html>
