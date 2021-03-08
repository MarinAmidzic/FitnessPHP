<?php

class Trener
{

    public static function ucitajSve()
    {
        $veza = DB::getInstanca();
        $izraz=$veza->prepare('
        
            select * from trener where sifra=1
        
        ');
        $izraz->execute();
        return $izraz->fetchAll();
    }

    public static function ucitajDrugog()
    {
        $veza = DB::getInstanca();
        $izraz=$veza->prepare('
        
            select * from trener where sifra=2
        
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