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
            $trener->prezime='';
            $trener->vrsta='';
            $trener->iskustvo='';
           // $this->view->render($this->viewDir . 'novo',[
           //     'smjer'=>$smjer,
           //     'poruka'=>'Popunite sve podatke'
           // ]);
            $this->novoView($trener,'Popunite sve podatke');
            return;
        }


        $trener = (object) $_POST;

        if(strlen(trim($trener->ime))===0){
           // $this->view->render($this->viewDir . 'novo',[
           //     'smjer'=>$smjer,
          //      'poruka'=>'Naziv obavezno'
           // ]);
           // linija ispod mijenja 4 linije iznad
            $this->novoView($trener,'Ime obavezno');
            return;
        }

        if(strlen(trim($trener->prezime))===0){
            $this->novoView($trener,'Prezime obavezno');
        }
        if(strlen(trim($trener->iskustvo))===0){
            $this->novoView($trener,'Iskustvo obavezno');
        }
        if(strlen(trim($trener->vrsta))===0){
            $this->novoView($trener,'Vrsta obavezno');
        }



        if(strlen(trim($trener->ime))>20){
            $this->novoView($trener,'Ime ne može imati više od 20 znakova');
            return;
        }

        if(strlen(trim($trener->prezime))>20){
            $this->novoView($trener,'Prezime ne može imati više od 20 znakova');
            return;
        }
        if(strlen(trim($trener->iskustvo))>20){
            $this->novoView($trener,'Iskustvo ne može imati više od 20 znakova');
            return;
        }
        if(strlen(trim($trener->vrsta))>20){
            $this->novoView($trener,'Vrsta ne može imati više od 20 znakova');
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