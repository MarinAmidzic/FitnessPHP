<?php
$dev=$_SERVER['REMOTE_ADDR']==='127.0.0.1' ? true : false;
if($dev){
    $baza=[
        'server'=>'localhost',
        'baza'=>'fitnessdatabase2',
        'korisnik'=>'edunova',
        'lozinka'=>'edunova'
    ];
}else{
    $baza=[
        'server'=>'localhost',
        'baza'=>'morfej_pp22',
        'korisnik'=>'morfej_edunova',
        'lozinka'=>'edunova123.'
    ];
}
return [
    'url'=>'http://zavrsnirad.hr/',
    'nazivApp'=>'Fitness',
    'baza'=>$baza
];