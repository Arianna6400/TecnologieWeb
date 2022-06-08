<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utenti;
use App\Models\ListaFaq;
use App\Models\Resource\Faq;
use App\Http\Requests\NewFAQRequest;
use App\Http\Requests\NewStatsRequest;
use App\Models\Catalogo;
use App\Models\Opzionate;
use Illuminate\Http\Request;

class AdminController extends Controller
{

   protected $_admin;
   protected $_faqModel;

   public function __construct(){
       $this->middleware('can:isAdmin');
       $this->_admin = new Utenti;
       
       $this->_opzionate = new Opzionate;
       $this->_catalogo = new Catalogo;
       $this->_faq = new Faq;
       $this->_faqModel = new ListaFaq;
       $this->_admin->role = 'Admin';
   }

    // permette di visualizzare le faq
   public function showFaq(){ 
       $faq = $this->_faqModel->ritornaFaq();
        return view('FAQ')
               ->with('faq', $faq);
   }

   public function index(){
        return view('admin');
    }
   
   // permette di aggiungere le faq i dati vanno gestiti dalle request
   public function newFaq(NewFAQRequest $request){

        $faq = new Faq;
        $faq->Domanda = $request->Domanda;
        $faq->Risposta = $request->Risposta;
        $faq->fill($request->validated());
        $faq->save();

        return redirect('/FAQ');
   }


   //funzione per la modifica delle faq
   public function updateFaq(Request $request){
        faq::where('id', $request->ID)
           ->update(['Domanda'=> $request->Domanda,
                     'Risposta'=> $request->Risposta,]);

        return redirect('/FAQ');
   }

   public function stats(){
       $catalogo= $this->_catalog->ritornaAlloggi();
       return view('stats');
   }

   public function find(NewStatsRequest $request){


       if(is_null($request->Inizio)){
           $request->Inizio = '2020-04-06';
       }

       if(is_null($request->Fine)){
           $request->Fine = '2030-04-06';
       }

       if(is_null($request->Tipo)){
           $request->Tipo = 'Tutti';
       }

       $opzionate = $this->_opzionate->getOpzionate($request->Tipo, $request->Inizio, $request->Fine);
       $tutte_offerte = $this->_catalogo->getTutteOfferte($request->Tipo, $request->Inizio, $request->Fine);
       $alloggi_locati = $this->_opzionate->getNonDisponibili($request->Tipo, $request->Inizio, $request->Fine);

       switch($request->Tipo){
           case 'Appartamento': $request->Tipo = 'Appartamento';
                                break;
           case 'Stanza singola': $request->Tipo = 'Stanza singola';
                                 break;
           case 'Stanza doppia': $request->Tipo = 'Stanza doppia';
                                break;
           case 'Tutti': $request->Tipo = 'Tutti';
                         break;
           default: $request->Tipo = 'Tutti';
       }

       //dd($alloggi_locati, $opzionate, $tutte_offerte);

       return view('stats')
             ->with('Inizio', $request->Inizio)
             ->with('Fine', $request->Fine)
             ->with('Tipo', $request->Tipo)
             ->with('opzionate', $opzionate)
             ->with('tutte_offerte', $tutte_offerte)
             ->with('alloggi_locati', $alloggi_locati);
   }
}
