<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\NewMessageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Utenti;
use App\Models\MieOfferte;
use App\Models\Resource\Alloggio;
use App\Models\Resource\Messaggio;
use App\Models\Resource\Caratteristiche;
use App\Models\Filtri;
use App\Models\Opzionate;
use App\Models\Chat;
use App\Models\Catalogo;
use App\Models\ListaFaq;
use App\Models\OffertaSingola;
use App\Models\OpzionaAlloggio;

class LocatarioController extends Controller
{
    protected $_opzionate;
    protected $_locatario;
    protected $_opziona;
    protected $_chat;
    protected $_offertaSingola;
    protected $_catalogoModel;
    protected $_faqModel;
    protected $alloggi_filtrati;
    protected $filtri;
    protected $_mieOfferte;

    public function __construct() {
        $this->middleware('can:isLocatario');
        $this->_opzionate = new Opzionate;
        $this->_opziona = new OpzionaAlloggio;
        $this->filtri = new Filtri;
        $this->_offertaSingola = new OffertaSingola;
        $this->_catalogoModel = new Catalogo;
        $this->_faqModel = new ListaFaq;
        $this->_locatario = new Utenti;
        $this->_locatario->role = 'Locatario';
        $this->_chat = new Chat;
        $this->alloggi_filtrati = collect([]);
        $this->_caratteristiche = new Caratteristiche;
        $this->_mieOfferte = new MieOfferte();
    }

    public function Opziona($idAlloggio){
        //nella view dobbiamo vedere cosa c'è dentro esito, perchè dalla funzione opziona, 
        //se ritorno true ho potuto fare l'inserimento, se ritorno false, o l'alloggio è pieno o ho già opzionato altro --> nella view 
        //se dentro esito c'è false non devo far vedere il tasto opziona
        return redirect('/locatario')
            ->with('disponibilità', $this->_opzionate->disponibili($idAlloggio));
    }
    // fa partire la vista 
    public function index(){
        return view('locatario');
    }

    public function chat(){
        return view('chat')
        ->with('messaggi_dest', $this->_chat->showChatDest(Auth::user()->Username))
        ->with('messaggi_mitt', $this->_chat->showChatMitt(Auth::user()->Username));
    }
    
    public function newMessage(NewMessageRequest $request){
        $messaggio = new Messaggio;
        $messaggio->Mittente = $request->Mittente;
        $messaggio->Destinatario = $request->Destinatario;
        $messaggio->IdAlloggio = $request->IdAlloggio;
        $messaggio->Data = $request->Data;
        $messaggio->Orario = $request->Orario;
        $messaggio->Contenuto = $request->Contenuto;
        $messaggio->fill($request->validated());
        $messaggio->save();
        
        return redirect('/locatario/chat');
    }
    
    //da opzionate contatta proprietario
    public function nuovaFormMessaggio($IdAlloggio,$usernameDest){
        date_default_timezone_set("Europe/Rome");
        return view('insert/insertMessage')
        ->with('usernameLoggato', Auth::user()->Username)
        ->with('destinatario', $usernameDest)
        ->with('alloggio', $IdAlloggio)
        ->with('data', date("Y/m/d"))
        ->with('orario', date("H:i"));
    }
    
    public function formMessaggio($IdMessaggio, $IdAlloggio){
        date_default_timezone_set("Europe/Rome");
        return view('insert/insertMessage')
            ->with('usernameLoggato', Auth::user()->Username)
            //ritorna il destinatario FUTURO del messaggio (ovvero quello che quando vado a clickare su rispondi era il mittente
            ->with('destinatario', $this->_chat->destinatarioByIdMessaggio($IdMessaggio)->Mittente)
            ->with('alloggio', $IdAlloggio)
            ->with('data', date("Y/m/d"))
            ->with('orario', date("H:i"));
    }
    
    //mostra l'alloggio opzionato dal locatario
    public function showMiaOpzionata() {
        if ($this->_opzionate->opzionatoLocatario(Auth::user()->Username) != null){
            $alloggio_opzionato =  $this->_opzionate->opzionatoLocatario(Auth::user()->Username)->first();
            return view('opzionate')
                ->with('alloggi_opzionati', $this->_opzionate->opzionatoLocatario(Auth::user()->Username))
                ->with('proprietario', $this->_mieOfferte->proprietario($alloggio_opzionato->ID));
        }
        else{
            return redirect ('/locatario');
        }
    }
    
    

    //mostralefaq
    public function showFaq() {
        $faq = $this->_faqModel->ritornaFaq();
        return view('FAQ')
               ->with('faq', $faq);
    }

    // mostra catalogo intero
    public function showCatalog(){
        $tutti_alloggi = $this->_catalogoModel->ritornaAlloggi();
        return view('locatario')
               ->with('catalogo_intero', $tutti_alloggi);
    }
    
    // mostra il catalogo filtrato tramite nome della citta e tramite i checkbox 
    public function showByCityandCheckBox(){
        $data = $request->all();
        $filtrati = $this->_catalogoModel->filtraggioIniziale($data['citta'],$data['tipoalloggio']);
        return view('home')
               ->with('filtrati', $filtrati)
               ->with('citta', 'Ancona')
               ->with('tipo', 'Appartamento');
       
    }

    //mostra l'alloggio che viene selezionato cliccando il titolo
    public function showOfferta($id)
    {
        $alloggio = $this->_offertaSingola->findAlloggioID($id);
        //offerta è un elemento singolo
        $offerta = $this->_offertaSingola->getAlloggioSelezionato($alloggio);
        return view('offerta')
                //risulta vuoto
             ->with('opzionateDa', $this->_opzionate->opzionatoLocatario(Auth::user()->Username))
             ->with('offerta', $offerta);
    }
    
    public function showAllLocal(){
        return view('catalogolocatario')
        ->with('alloggi', Alloggio::all());
    }
    
    public function showFilteredLocal(Request $request){
        $filtri = $request->all();
        foreach($filtri as $key => $value){
       
            switch($key){
                case 'citta': {
                    if($value != ''){
                        $this->applyFilter('citta', $value);
                    }
                }
                case '_token':break;
                default: {
                    foreach($value as $key1 => $value1){
                        $this->applyFilter($key, $value1);
                    }
                }
            }
      
        }
        return view('catalogolocatario')
        ->with('alloggi', $this->alloggi_filtrati->collapse()->unique());
     }
     

    private function applyFilter($filtro,$scelta){
    switch($filtro){
        case 'citta': $this->alloggi_filtrati->push($this->filtri->filtroCitta($scelta));
            break;
        case 'tipo_alloggio': $this->alloggi_filtrati->push($this->filtri->filtroTipo($scelta));
            break;
        case 'posti_letto': $this->alloggi_filtrati->push($this->filtri->filtriPostiTot($scelta));
        break;
        case 'prezzo': $this->alloggi_filtrati->push($this->filtri->filtriPrezzo($scelta));
        break;
        case 'dimensione': $this->alloggi_filtrati->push($this->filtri->filtriDimensione($scelta));
        break;
        case 'servizi_aggiuntivi': $this->alloggi_filtrati->push($this->filtri->filtroserviziAggiuntivi($scelta));
        break;
        case 'numero_locali': $this->alloggi_filtrati->push($this->filtri->filtroNumeroLocali($scelta));
        break;
        case 'posti_letto_stanza': $this->alloggi_filtrati->push($this->filtri->filtropostiLettoStanza($scelta));
        break;
        case 'numero_bagni': $this->alloggi_filtrati->push($this->filtri->filtroNumeroBagni($scelta));
        break;
        case 'numero_stanze_letto': $this->alloggi_filtrati->push($this->filtri->filtronumeroStanze($scelta));
        break;
        case 'eta_minima': $this->alloggi_filtrati->push($this->filtri->filtroEtaMinima($scelta));
        break;
        case 'sesso_richiesto': $this->alloggi_filtrati->push($this->filtri->filtroSessoRischiesto($scelta));
        break;
    }
    }

    //permette di aprire il profilo utente
    public function showProfile(){
        return view('profilo')->with('utente',auth()->user());
    }
    
    
}