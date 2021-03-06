<?php

class Trener
{

    public static function ucitaj($sifra)
    {
        $veza = DB::getInstanca();
        $izraz=$veza->prepare('
        
            select * from Trener where sifra=:sifra
        
        ');
        $izraz->execute(['sifra'=>$sifra]);
        return $izraz->fetch();
    }
   

    public static function ucitajSve()
    {
        $veza = DB::getInstanca();
        $izraz=$veza->prepare('
        
            select * from Trener 
        
        ');
        $izraz->execute();
        return $izraz->fetchAll();
    }

    /*
    public static function Trener1()
    {
        $veza = DB::getInstanca();
        $izraz=$veza->prepare('
        
            select * from Trener where sifra=1
        
        ');
        $izraz->execute();
        return $izraz->fetchAll();
    }
*/
    
   

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

    public static function dodajNovi($trener)
    {
        $veza = DB::getInstanca();
        $izraz=$veza->prepare('
        
            insert into Trener (ime,prezime,iskustvo,vrsta)
            values (:ime,:prezime,:iskustvo,:vrsta)
        
        ');
        $izraz->execute((array)$trener);
    }

    
}



