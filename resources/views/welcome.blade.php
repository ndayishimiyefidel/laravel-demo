<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
</head>
<?php $version = 9.0 ?>

<body>
    <h1>Welcome to Laravel docoumentation</h1>


    <a href="{{ route('myAboutMe') }}"> about me</a>
</body>


</html>

<?php
// @for ($i = 1; $i <= 10; $i++) 
//     echo $i;
// @endfor;



// $talks="word";

// @if (count($talks) === 1)
// // There is one talk at this time period.
// @elseif (count($talks) === 0)
// // There are no talks at this time period.
// @else
// // There are {{ count($talks) }} talks at this time period.
// @endif