<?php

class TrenerController extends AutorizacijaController
{
    private $viewDir = 'privatno'
                        . DIRECTORY_SEPARATOR
                        . 'trener'
                        . DIRECTORY_SEPARATOR;
    private $trener=null;
    private $poruka='';


    public function index()
    {
        $this->view->render($this->viewDir . 'index',[
            'treneri'=>Trener::ucitajSve()
        ]);    
        
    }

    
    public function novo()
    {
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $this->noviTrener();
            return;
        }
        $this->trener = (object) $_POST;
        if(!$this->kontrolaIme()){return;}
        if(!$this->kontrolaPrezime()){return;}
        if(!$this->kontrolaIskustvo()){return;}
        if(!$this->kontrolaVrsta()){return;}
        Trener::dodajNovi($this->trener);
        $this->index();
    }
    
    private function noviTrener()
    {
        $this->trener = new stdClass();
        $this->trener->ime='';
        $this->trener->prezime='';
        $this->trener->iskustvo='';
        $this->trener->vrsta='';
        $this->poruka='Unesite tražene podatke';
        $this->novoView();
    }




    private function novoView()
    {
        $this->view->render($this->viewDir . 'novo',[
            'trener'=>$this->trener,
            'poruka'=>$this->poruka
        ]);
    }
    


    private function kontrolaIme()
    {
        if(strlen(trim($this->trener->ime))===0){
            $this->poruka='Ime obavezno';
            $this->novoView();
            return false;
         }
 
         if(strlen(trim($this->trener->ime))>20){
            $this->poruka='Ime ne može imati više od 20 znakova';
            $this->novoView();
            return false;
         }
         return true;
    }

    private function kontrolaPrezime()
    {
        if(strlen(trim($this->trener->prezime))===0){
            $this->poruka='Prezime obavezno';
            $this->novoView();
            return false;
         }
 
         if(strlen(trim($this->trener->prezime))>20){
            $this->poruka='Prezime ne može imati više od 20 znakova';
            $this->novoView();
            return false;
         }
         return true;
    }



    private function kontrolaIskustvo()
    {
        if(strlen(trim($this->trener->iskustvo))===0){
            $this->poruka='Iskustvo obavezno';
            $this->novoView();
            return false;
         }
 
         if(strlen(trim($this->trener->iskustvo))>20){
            $this->poruka='Iskustvo ne može imati više od 20 znakova';
            $this->novoView();
            return false;
         }
         return true;
    }



    private function kontrolaVrsta()
    {
        if(strlen(trim($this->trener->vrsta))===0){
            $this->poruka='Vrsta obavezno';
            $this->novoView();
            return false;
         }
 
         if(strlen(trim($this->trener->vrsta))>20){
            $this->poruka='Vrsta ne može imati više od 20 znakova';
            $this->novoView();
            return false;
         }
         return true;
    }

    
    




    







}