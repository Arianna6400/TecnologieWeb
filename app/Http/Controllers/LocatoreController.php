<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\NewMessageRequest;
use App\Utenti;
use App\Models\MieOfferte;
use App\Models\Opzionate;
use App\Models\Chat;
use App\Models\Catalogo;
use App\Models\ListaFaq;
use App\Models\OffertaSingola;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resource\Alloggio;
use App\Models\Resource\Interazione;
use App\Models\Resource\Messaggio;
use App\Models\Resource\Caratteristiche;
use App\Http\Requests\NewAlloggioRequest;
use App\Http\Requests\NewCaratteristicheRequest;
class LocatoreController extends Controller
{
    protected $_locatore;
    protected $_mieOfferte;
    protected $_opzionate;
    protected $_catalogoModel;
    protected $_faqModel;
    protected $_offertaSingola;
   
    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_mieOfferte = new MieOfferte;
        $this->_opzionate = new Opzionate;
        $this->_locatore = new Utenti;
        $this->_offertaSingola = new OffertaSingola;
        $this->_catalogoModel = new Catalogo;
        $this->_faqModel = new ListaFaq;
        $this->_locatore->role = 'Locatore';
        $this->_chat = new Chat;
    }
    
    public function showCatalogoMieOfferte(){
        $tutti_alloggi = $this->_mieOfferte->alloggiCaricati(Auth::user()->Username); 
        return view('mieOfferte')
               ->with('catalogo_offerte', $tutti_alloggi);
    }
    
    public function showAlloggiOpzionati(){
        $alloggi_opzionati = $this->_opzionate->opzionate(Auth::user()->Username);
        return view('opzionate')
            ->with('alloggi_opzionati', $alloggi_opzionati)
            ->with('arrayUsername', $this->_opzionate->lista($alloggi_opzionati));
    }
    
    public function deleteLocal($id){
        $this->_mieOfferte->eliminaAlloggioById($id);
        return redirect('locatore/mie_offerte');
    }
    
    public function chat(){
        return view('chat')
            ->with('messaggi', $this->_chat->showChat(Auth::user()->Username));
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
        
        return redirect('/locatore/chat');
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
    
    public function index(){
        return view('locatore');
    }

    //funzione che esegue la richiesta per alloggio e per caratteristiche
    public function save2(NewCaratteristicheRequest $request){
            $alloggio= new Alloggio;
            $alloggio= $request->session()->get('dataalloggio'); // qui prendo i dati dalla sessione di sotto e li metto in un nuovo alloggio
            $alloggio->save();
            $caratteristiche = new Caratteristiche;
            $caratteristiche->fill($request->validated());
            $caratteristiche->save();
            $idalloggio = $this->_catalogoModel->getlastid();
            $interazione = new Interazione;
            $interazione->Username = $request->Username;
            $interazione->ID = $idalloggio->ID;
            $interazione->save();
            $message = "inserimento andato a buon fine";
            echo "<script type='text/javascript'>alert('$message'); location='locatore/mie_offerte';</script>"; //questo ritorna la view le si sono problemi in fuuro va cambiato
    }
    //funzione che istanzia la richiesta per alloggio
    public function save(NewAlloggioRequest $request){
        if ($request->hasFile('Foto')) {
            $image = $request->file('Foto');
            $imageName = $image->getClientOriginalName();
            } else {
            $imageName = NULL;
            }
        
            $alloggio = new Alloggio;
            $alloggio->fill($request->validated());
            $alloggio->Foto = $imageName;
            $request->session()->put('dataalloggio',$alloggio); //questo apre una sessione e inserisce la request di alloggio
            
            if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images';
            $image->move($destinationPath, $imageName);
            };

        return view('insert/insertcaratteristiche',compact('alloggio'));
                           
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
        return view('locatore')
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
        $alloggio = $this->_offertaSingola->findAlloggioID($id);
        $offerta = $this->_offertaSingola->getAlloggioSelezionato($alloggio);
        return view('offerta')
             ->with('offerta', $offerta);
    }

    //permette di aprire il profilo utente
    public function showProfile(){
        return view('profilo')->with('utente',auth()->user());
    }
    
    // permette di modificare un alloggio, i dati necessari per l'inserimento vanno presi con una request
    public function updateLocal(){
        
    }
    
    //  permette di modificare il profilo di un locatore, l'id del locatore e i dati da modificare vengono gestiti da una request
    public function updateProfile(){
        
    }
    
    // permette di visualizzare la scheda tecnica di una alloggio, l'id dell'alloggio viene preso tramite una request
    public function showLocalCard(){
        
    }
    
    // permette di mostrare tutte le richieste per ogni alloggio, a questo metodo vanno passati l'id del locatore e l'id del' alloggio
    public function showLocalRequest(){
        
    }

    // permette di inviare un messaggio, va passato l'id del mittente e l'id del destinatario
    public function sendMessage(){
        
    }
}
