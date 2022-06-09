<?php

namespace App\Models;
use App\Models\Resource\Alloggio;
use App\Models\Resource\Caratteristiche;

Class Filtri{
    
public function filtroCitta($scelta){
    return Alloggio::where('Citta', $scelta)->get();
}

public function filtroTipo($scelta){
    switch ($scelta){
        case 'appartamento': return Alloggio::where('Tipo', 'Appartamento')->get();
        case 'stanza_singola': return Alloggio::where('Tipo', 'Stanza singola')->get();
        case 'stanza_doppia': return Alloggio::where('Tipo', 'Stanza doppia')->get();
            
    }
}

public function filtroDimensione($max, $min){
    return Alloggio::where('Metratura', '>' , $min)->where('Metratura', '<' , $max)->get();
}

public function filtroPrezzo($max, $min){
    return Alloggio::where('Costo', '>' , $min)->where('Costo', '<' , $max)->get();
}

public function fitroPostiTotali($numeroPosti){
// ritorna un array di id di alloggi che anno quelle caratteristiche
$id = Caratteristiche::where('PostiLettoTot', $numeroPosti)->select('ID')->get();
return Alloggio::find($id);
}

public function filtriDimensione($scelta){
switch ($scelta){
case 'metratura_1': return $this->filtroDimensione(101,50);
case 'metrature_2': return $this->filtroDimensione(201, 102);
case 'metratura_3': return $this->filtroDimensione(1000000, 202);
}
}
public function filtriPrezzo($scelta){
switch ($scelta){
case 'prezzo_1': return $this->filtroPrezzo(301,200);
case 'prezzo_2': return $this->filtroPrezzo(401, 302);
case 'prezzo_3': return $this->filtroPrezzo(1000000, 402);
}
}

public function filtriPostiTot($scelta) {
switch ($scelta){
case 'postiletto_1': return $this->fitroPostiTotali(1);
case 'postiletto_2': return $this->fitroPostiTotali(2);
case 'postiletto_3': return $this->fitroPostiTotali(3);
case 'postiletto_4': return $this->fitroPostiTotali(4);
}
}

public function filtroserviziAggiuntivi($nomeServizio){
switch($nomeServizio){

case 'ripostiglio': {
$id = Caratteristiche::where('Ripostiglio', '>', 0)->select('ID')->get();
return Alloggio::find($id);
}
case 'sala':{
$id = Caratteristiche::where('Sala', '>', 0)->select('ID')->get();
return Alloggio::find($id);
}
case 'wifi':{
$id = Caratteristiche::where('WiFi', '>', 0)->select('ID')->get();
return Alloggio::find($id);
}
case 'garage':{
$id = Caratteristiche::where('Garage', '>', 0)->select('ID')->get();
return Alloggio::find($id);
}
case 'angolo_studio':{
$id = Caratteristiche::where('AngoloStudio', '>', 0)->select('ID')->get();
return Alloggio::find($id);
}
}
}

public function filtroNumeroLocali($scelta){
switch($scelta){
case '2': {
$id = Caratteristiche::where('NumeroLocali', 2)->select('ID')->get();
return Alloggio::find($id);
}
case '3': {
$id = Caratteristiche::where('NumeroLocali', 3)->select('ID')->get();
return Alloggio::find($id);
}
case '+3': {
$id = Caratteristiche::where('NumeroLocali', '>', 3)->select('ID')->get();
return Alloggio::find($id);
}
}
}

//aggiungere nel database l'attributo posti letto stanza
public function filtropostiLettoStanza($scelta){
$id = Caratteristiche::where('NumPostiStanza', 1)->select('ID')->get();
return Alloggio::find($id);

}

public function filtroNumeroBagni($scelta){
if($scelta==1){
    $id = Caratteristiche::where('NumBagni', $scelta)->select('ID')->get();
}
else{
    $id = Caratteristiche::where('NumBagni', '>=',$scelta)->select('ID')->get();
}
return Alloggio::find($id);
}

public function filtronumeroStanze($scelta) {
switch($scelta){
case '2': {
$id = Caratteristiche::where('NumStanzeLetto', 2)->select('ID')->get();
return Alloggio::find($id);
}
case '3': {
$id = Caratteristiche::where('NumStanzeLetto', 3)->select('ID')->get();
return Alloggio::find($id);
}
case '+3': {
$id = Caratteristiche::where('NumStanzeLetto', '>', 3)->select('ID')->get();
return Alloggio::find($id);
}
}
}

public function filtroEtaMinima($scelta){
switch($scelta){
case '18': {
$id = Caratteristiche::where('EtaMinima', '>=' , 18)->select('ID')->get();
return Alloggio::find($id);
}
case '25': {
$id = Caratteristiche::where('EtaMinima', '>=' , 25)->select('ID')->get();
return Alloggio::find($id);
}
case '30': {
$id = Caratteristiche::where('EtaMinima', '>=', 30)->select('ID')->get();
return Alloggio::find($id);
}
}
}

public function filtroSessoRischiesto($scelta){
if($scelta == 'M'){
$id = Caratteristiche::where('SessoRichiesto', 'M')->select('ID')->get();
return Alloggio::find($id);
}else{
$id = Caratteristiche::where('SessoRichiesto', 'F')->select('ID')->get();
return Alloggio::find($id);
}
}

}
