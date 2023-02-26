<?php
// blade syntax
$world = "Hi Fidel";
// echo "Blade syntax in php";
echo "\n\n";
$arr = [10, 9, 6, 19, 3, 22, 40, 60];
// <!-- <a href="{{ route('myAboutMe') }}"> about me</a> -->
//blade syntax used in html files
// if($world){

// }else{}
?>

{{ $world }}
@for ($i = 1; $i <= 10; $i++) {{$i}} @endfor @if($world) You're handsome wallah! @endif @foreach ($arr as $key=> $value)

    {{$value}}

    @endforeach;