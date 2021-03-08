<?php

class TrenerController extends AutorizacijaController
{
    private $viewDir = 'privatno'
                        . DIRECTORY_SEPARATOR
                        . 'trener'
                        . DIRECTORY_SEPARATOR;

    public function index()
    {
        $this->view->render($this->viewDir . 'index',[
            'treneri'=>Trener::ucitajSve()
        ]);    
        
    }

    

    


    public function novo()
    {
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $trener = new stdClass();
            $trener->ime='';
            $trener->prezime=100;
            $trener->vrsta=1000;
            $trener->iskustvo='0';
           // $this->view->render($this->viewDir . 'novo',[
           //     'smjer'=>$smjer,
           //     'poruka'=>'Popunite sve podatke'
           // ]);
            $this->novoView($trener,'Popunite sve podatke');
            return;
        }


        $trener = (object) $_POST;

        if(strlen(trim($smjer->naziv))===0){
           // $this->view->render($this->viewDir . 'novo',[
           //     'smjer'=>$smjer,
          //      'poruka'=>'Naziv obavezno'
           // ]);
           // linija ispod mijenja 4 linije iznad
            $this->novoView($smjer,'Naziv obavezno');
            return;
        }

        if(strlen(trim($smjer->naziv))>50){
            $this->novoView($smjer,'Naziv ne može imati više od 50 znakova');
            return;
        }
        
        if(!is_numeric($smjer->trajanje)
            || ((int)$smjer->trajanje)<=0){
            $this->novoView($smjer,'Trajanje mora biti cijeli pozitivni broj');
            return;
      }

      $smjer->cijena=str_replace(',','.',$trener->cijena);
      if(!is_numeric($trener->cijena)
            || ((float)$trener->cijena)<=0){
            $this->novoView($trener,'Cijena mora biti pozitivni broj');
            return;
      }

      // npr. svojstvu verificiran ne treba kontrola

      // ovdje sam siguran da je sve OK prije odlaska u bazu
      Trener::dodajNovi($trener);
      $this->index();
       
    }

    private function novoView($trener, $poruka)
    {
        $this->view->render($this->viewDir . 'novo',[
            'trener'=>$trener,
            'poruka'=>$poruka
        ]);
    }

}