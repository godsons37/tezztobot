@extends('1.master')
@section('php')
    <?php
    use Illuminate\Support\Facades\DB;

    $id = '1-1_yVsyktQXCOXk2rSEDWUe2tUeVXcg5G2EgeE-RjY0';
    $gid = '0';

    $csv = file_get_contents('https://docs.google.com/spreadsheets/d/' . $id . '/export?format=csv&gid=' . $gid);
    $csv = explode("\r\n", $csv);
    $array = array_map('str_getcsv', $csv);

        $arrind = [];
        foreach ($array as $key => $ar){
            if ($key === 0){
                continue;
            }
            $arrind[] = $ar[0];
        }


    $user = DB::table('tesbots');




    $dtind = [];
    if (isset($data[0])){
    foreach ($data as $dt){
        $dtind[] = ($dt->id);
        if (in_array(($dt->id), $arrind)){
            continue;
        }else{
            DB::table('testbots')->insert([
            'id' => $ar[0],
            'name' => $ar[1],
            'qty' => $ar[2],
            'desc' => $ar[3],
            'price' => $ar[4],
            'img' => $ar[5],
            'availability' => $ar[6]
            ]);
        }
        }
        foreach ($array as $key => $ar){
            if ($key === 0){
                continue;
            }
            if (in_array($ar[0], $dtind)){
                continue;
            }else{
                DB::table('testbots')->insert([
                    'id' => $ar[0],
                    'name' => $ar[1],
                    'qty' => $ar[2],
                    'desc' => $ar[3],
                    'price' => $ar[4],
                    'img' => $ar[5],
                    'availability' => $ar[6]
                ]);
            }
        }
    }else{
        foreach ($array as $key => $ar){
            if ($key === 0){
                continue;
            }
                DB::table('testbots')->insert([
                    'id' => $ar[0],
                    'name' => $ar[1],
                    'qty' => $ar[2],
                    'desc' => $ar[3],
                    'price' => $ar[4],
                    'img' => $ar[5],
                    'availability' => $ar[6]
                ]);
        }
    }
    ?>

@endsection
