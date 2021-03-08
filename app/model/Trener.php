<?php

class Trener
{

    public static function ucitajSve()
    {
        $veza = DB::getInstanca();
        $izraz=$veza->prepare('
        
            select * from trener 
        
        ');
        $izraz->execute();
        return $izraz->fetchAll();
    }
   

   /* public static function dodajNovi($trener)
    {
        $veza = DB::getInstanca();
        $izraz=$veza->prepare('
        
            insert into smjer (naziv,trajanje,cijena,verificiran)
            values (:naziv,:trajanje,:cijena,:verificiran)
        
        ');
        $izraz->execute((array)$smjer);
    }
    */
}

