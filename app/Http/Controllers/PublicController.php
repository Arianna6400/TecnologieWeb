<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Catalogo;
use App\Models\ListaFaq;
use App\Models\OffertaSingola;
use App\Http\Requests\ModifyProfiloRequest;
use App\Models\Resource\Alloggio;
use App\Models\MieOfferte;
use Illuminate\Http\Request;
use App\Utenti;
use Illuminate\Support\Facades\Hash;

class PublicController extends Controller
{
    protected $_catalogoModel;
    protected $_mieOfferte;
    protected $_faqModel;
    protected $_offertaSingola;
    
    public function __construct(){
        $this->_mieOfferte = new MieOfferte;
        $this->_catalogoModel = new Catalogo;
        $this->_faqModel = new ListaFaq;
        $this->_offertaSingola = new OffertaSingola;
    }

    //mostra le faq
    public function showFaq() {
        $faq = $this->_faqModel->ritornaFaq();
        return view('FAQ')
               ->with('faq', $faq);
    }

    // mostra catalogo intero
    public function showCatalog(){
        $tutti_alloggi = $this->_catalogoModel->ritornaAlloggi();
        return view('home')
               ->with('catalogo_intero', $tutti_alloggi);
    }
    
    // mostra il catalogo filtrato tramite nome della citta e tramite i checkbox 
    public function showByCityandCheckBox(Request $request){
        $data = $request->all();
        if(isset($data['citta']) && isset($data['tipoalloggio'])){
            $filtrati = $this->_catalogoModel->filtraggioIniziale($data['citta'],$data['tipoalloggio']);
        }
        elseif(!isset($data['citta'])){
            $filtrati = $this->_catalogoModel->filtraggioInizialeAlloggio($data['tipoalloggio']);
        }
        elseif(!isset($data['tipoalloggio'])){
            $filtrati = $this->_catalogoModel->filtraggioInizialeCitta($data['citta']);
        }
        return view('home',compact('filtrati','data'));
       
    }

    //mostra l'alloggio che viene selezionato cliccando il titolo
    public function showOfferta($id){
        if(Auth::guest() || Auth::user()->role == 'Locatario'){
            $alloggio = $this->_offertaSingola->findAlloggioID($id);
            $offerta = $this->_offertaSingola->getAlloggioSelezionato($alloggio);
            return view('offerta')
                ->with('offerta', $offerta);
        }
        else{
            $tutti_miei_alloggi = $this->_mieOfferte->alloggiCaricati(Auth::user()->Username);
            $alloggio = $this->_offertaSingola->findAlloggioID($id);
            $offerta = $this->_offertaSingola->getAlloggioSelezionato($alloggio);
            return view('offerta')
                ->with('offerta', $offerta)
                ->with('miei_alloggi', $tutti_miei_alloggi);
        }
    }

    public function modprofilo(ModifyProfiloRequest $request){
        utenti::where('username', $request->Username)
                ->update(['Nome' => $request->Nome,
                         'Cognome'=>$request->Cognome,
                         'Sesso'=>$request->Sesso,
                         'DataNascita'=>$request->DataNascita,
                         'Username'=>$request->Username,
                         'password'=>Hash::make($request->password),]
                        );
            return response()->json(['ciao' => 'ciao']);
        
    }
}
