<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utenti;
use App\Models\ListaFaq;
use App\Models\Resource\Faq;
use App\Http\Requests\NewFAQRequest;
use App\Http\Requests\NewStatsRequest;
use App\Models\Catalogo;
use Illuminate\Http\Request;

class AdminController extends Controller
{

   protected $_admin;
   protected $_faqModel;

   public function __construct(){
       $this->middleware('can:isAdmin');
       $this->_admin = new Utenti;

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

       $inizio = '';
       $fine = '';
       $tipo = '';

       if($request->Start_stats == null){
           $request->Start_stats = '2000-04-06';
       }
   }
}
