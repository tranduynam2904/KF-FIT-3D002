<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // $arrayPoint = [2 ,5, 7, 8, 9];
    // $arrayAnimal = ['Meo', 'Cho', 'Ca', 'Gau', 'Huu Cao Co'];

    // foreach($arrayAnimal as $key => $animal){
    //   $color = 'green';
    //   if(($key+1) % 2 === 0){
    //     $color = 'red';
    //   }
    //   echo ($key+1).".<span style='color:".$color.";'>$animal</span><br>";
    // }
    ?>

    @php
        $arrayPoint = [2, 5, 7, 8, 9];
        $arrayAnimal = ['Meo', 'Cho', 'Ca', 'Gau', 'Huu Cao Co'];
        // dd($arrayAnimal);
    @endphp

    @foreach ($arrayAnimal as $animal)
        {{-- {{ $animal }} --}}
        {{-- {{ $loop->index }}
        {{ $loop->iteration }} --}}
        @if ($loop->even)
            {!! $loop->iteration . "<span style='color:red'>" . $animal . '</span><br>' !!}
        @elseif($loop->odd)
            {!! $loop->iteration . "<span style='color:green'>" . $animal . '</span><br>' !!}
        @endif
    @endforeach

    @foreach ($arrayPoint as $point)
        {{ $point }}<br>
    @endforeach


    <h1>Test 22222</h1>
</body>

</html>
