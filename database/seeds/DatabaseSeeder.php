<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('faq')->insert([
            ['Domanda' => 'Posso contattare direttamente il proprietario attraverso il sito?', 'Risposta' => 'Sì, è possibile attraverso il servizio di messaggistica interno al sito'],
            ['Domanda' => 'Quante case si possono opzionare?', 'Risposta' => 'In seguito alla selezione attraverso il filtraggio, si potrà effettivamente opzionare un solo alloggio'],
            ['Domanda' => 'Da locatore, in che modalità posso contattare il locatario che ha opzionato una delle mie offerte?', 'Risposta' => 'Nell apposita sezione dedicata alla
            visualizzazione degli utenti che hanno opzionato un suo alloggio, sarà possibile visualizzare l utente interessato ed interagire con esso attraverso la sezione di messaggistica'],
            ['Domanda' => 'Posso modificare un alloggio inserito nel caso in cui io voglia cambiare alcune caratteristiche?', 'Risposta' =>'Sì, è possibile selezionando la sezione relativa alle
            offerte inserite, e selezionando uno degli alloggi da lei inserito, potrà decidere se modificarne le caratteristiche o cancellarlo definitivamente'],
            ['Domanda' => 'Quanti alloggi posso inserire?', 'Risposta' => 'Non ci sono limitazioni, può inserire quante offerte preferisce'],
            ['Domanda' => 'Posso filtrare gli alloggi in modo da riscontrare le caratteristiche che più mi piacciono?', 'Risposta' => 'Nella sezione di filtraggio del catalogo
            sono presenti numerosi filtri da poter inserire, quindi è possibile venire incontro alle proprie esigenze e trovare la locazione ideale'],
        ]);

        DB::table('alloggio')->insert([
            ['Citta' => 'Ancona', 'Via' => 'Brecce Bianche', 'NumCivico' => '16', 'Costo' => 300, 'PeriodoInizio' => date("2022-05-05"),
             'PeriodoFine' => date("2022-07-08"), 'Metratura' => 500, 'NumOpzionate' => 0, 'Disponibilita' => 1,'Descrizione' => "Appartamento in zona tranquilla, a due passi dall'università di Ancona. 
              Consigliato per studenti di Ingegneria, Biologia e Agraria", 'Tipo' => 'Appartamento', 'Foto' => 'app1.jpg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['Citta' => 'Ancona', 'Via' => 'Mazzini', 'NumCivico' => '69', 'Costo' => 150, 'PeriodoInizio' => date("2022-05-05"),
             'PeriodoFine' => date("2022-07-08"), 'Metratura' => 300, 'NumOpzionate' => 0, 'Disponibilita' => 1,'Descrizione' => "Posto letto in appartamento nel centro della città",
             'Tipo' => 'Stanza singola', 'Foto' => 'app2.jpg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['Citta' => 'Pescara', 'Via' => 'Felice Barnabei', 'NumCivico' => '90', 'Costo' => 250, 'PeriodoInizio' => date("2022-07-09"),
             'PeriodoFine' => date("2022-07-08"), 'Metratura' => 300, 'NumOpzionate' => 0, 'Disponibilita' => 1,"Descrizione" => "Posto letto in stanza doppia vicino zona stadio e università",
             'Tipo' => 'Stanza doppia', 'Foto' => 'app3.jpg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['Citta' => 'Pescara', 'Via' => 'Marconi', 'NumCivico' => '420', 'Costo' => 280, 'PeriodoInizio' => date("2022-06-08"),
             'PeriodoFine' => date("2022-07-09"), 'Metratura' => 500, 'NumOpzionate' => 0, 'Disponibilita' => 1,"Descrizione" => "Appartamento spazioso in zona vicino all'università di Pescara",
             'Tipo' => 'Appartamento', 'Foto' => 'app4.jpeg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
             ['Citta' => 'Torino', 'Via' => 'Roma', 'NumCivico' => '12', 'Costo' => 210, 'PeriodoInizio' => date("2022-06-06"),
             'PeriodoFine' => date("2022-08-08"), 'Metratura' => 100, 'NumOpzionate' => 0, 'Disponibilita' => 1,'Descrizione' => "Stanza singola in centro ben collegata",
             'Tipo' => 'Stanza singola', 'Foto' => 'app5.jpg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
             ['Citta' => 'Napoli', 'Via' => 'brombeis', 'NumCivico' => '32', 'Costo' => 110, 'PeriodoInizio' => date("2022-06-12"),
             'PeriodoFine' => date("2023-11-08"), 'Metratura' => 110, 'NumOpzionate' => 0, 'Disponibilita' => 1,'Descrizione' => "Stanza doppia in periferia ben collegata",
             'Tipo' => 'Stanza doppia', 'Foto' => 'app6.jpg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
             ['Citta' => 'Pescara', 'Via' => 'torrente piomba', 'NumCivico' => '12', 'Costo' => 260, 'PeriodoInizio' => date("2022-06-06"),
             'PeriodoFine' => date("2022-10-08"), 'Metratura' => 200, 'NumOpzionate' => 0, 'Disponibilita' => 1,'Descrizione' => "Appartamento vicino al mare",
             'Tipo' => 'Appartamento', 'Foto' => 'app7.jpeg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
             ['Citta' => 'Chieti', 'Via' => 'Spatocco', 'NumCivico' => '6', 'Costo' => 300, 'PeriodoInizio' => date("2022-06-01"),
             'PeriodoFine' => date("2022-09-01"), 'Metratura' => 350, 'NumOpzionate' => 0, 'Disponibilita' => 1,'Descrizione' => "Appartamento vicino al campus
             universitario, comodo per studenti di medicina",
             'Tipo' => 'Appartamento', 'Foto' => 'app8.jpg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
              ['Citta' => 'Fermo', 'Via' => 'Monteverde', 'NumCivico' => '12', 'Costo' => 180, 'PeriodoInizio' => date("2022-06-20"),
             'PeriodoFine' => date("2023-06-20"), 'Metratura' => 150, 'NumOpzionate' => 0, 'Disponibilita' => 1,'Descrizione' => "Posto letto vicino all'università di Fermo",
             'Tipo' => 'Stanza Singola', 'Foto' => 'app9.jpg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
             ['Citta' => 'Ancona', 'Via' => 'Brecce Bianche', 'NumCivico' => '16', 'Costo' => 180, 'PeriodoInizio' => date("2022-06-20"),
             'PeriodoFine' => date("2023-07-20"), 'Metratura' => 150, 'NumOpzionate' => 0, 'Disponibilita' => 1,'Descrizione' => "Posto letto in doppia in complesso di palazzine a due passi dall'università'",
             'Tipo' => 'Stanza Doppia', 'Foto' => 'app10.jpg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
             ['Citta' => 'Bari', 'Via' => 'Lungomare Nazario Sauro', 'NumCivico' => '120', 'Costo' => 450, 'PeriodoInizio' => date("2022-06-20"),
             'PeriodoFine' => date("2023-07-20"), 'Metratura' => 500, 'NumOpzionate' => 0, 'Disponibilita' => 1,'Descrizione' => "Casa moderna a due passi dal mare",
             'Tipo' => 'Appartamento', 'Foto' => 'app11.jpg','created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        ]);

        DB::table('caratteristiche')->insert([
            ['ID' => 1, 'Ripostiglio' => 0, 'Sala' => 1, 'SessoRichiesto' => 'M', 'WiFi' => 1, 'Garage' => 0, 'AngoloStudio' => 1, 'NumeroLocali' => 4,
            'NumBagni' => 1, 'PostiLettoTot' => 3, 'EtaMinima' => 19, 'NumStanzeLetto' => 2],
            ['ID' => 2, 'Ripostiglio' => NULL, 'Sala' => NULL, 'SessoRichiesto' => 'F', 'WiFi' => 1, 'Garage' => NULL, 'AngoloStudio' => 1, 'NumeroLocali' => NULL,
            'NumBagni' => NULL, 'PostiLettoTot' => 1, 'EtaMinima' => 23, 'NumStanzeLetto' => NULL],
            ['ID' => 3, 'Ripostiglio' => NULL, 'Sala' => NULL, 'SessoRichiesto' => 'M', 'WiFi' => 1, 'Garage' => NULL, 'AngoloStudio' => 0, 'NumeroLocali' => NULL,
            'NumBagni' => NULL, 'PostiLettoTot' => 4, 'EtaMinima' => 18, 'NumStanzeLetto' => NULL],
            ['ID' => 4, 'Ripostiglio' => 1, 'Sala' => 0, 'SessoRichiesto' => 'M', 'WiFi' => 1, 'Garage' => 0, 'AngoloStudio' => 1, 'NumeroLocali' => 4,
            'NumBagni' => 2, 'PostiLettoTot' => 2, 'EtaMinima' => 18, 'NumStanzeLetto' => 3],
            ['ID' => 5, 'Ripostiglio' => NULL, 'Sala' => NULL, 'SessoRichiesto' => 'M', 'WiFi' => 1, 'Garage' => NULL, 'AngoloStudio' => 1, 'NumeroLocali' => NULL,
            'NumBagni' => NULL, 'PostiLettoTot' => 1, 'EtaMinima' => 20, 'NumStanzeLetto' => NULL],
            ['ID' => 6, 'Ripostiglio' => NULL, 'Sala' => NULL, 'SessoRichiesto' => 'F', 'WiFi' => 1, 'Garage' => NULL, 'AngoloStudio' => 0, 'NumeroLocali' => NULL,
            'NumBagni' => NULL, 'PostiLettoTot' => 2, 'EtaMinima' => 18, 'NumStanzeLetto' => NULL],
            ['ID' => 7, 'Ripostiglio' => 0, 'Sala' => 1, 'SessoRichiesto' => 'M', 'WiFi' => 1, 'Garage' => 0, 'AngoloStudio' => 1, 'NumeroLocali' => 4,
            'NumBagni' => 2, 'PostiLettoTot' => 5, 'EtaMinima' => 18, 'NumStanzeLetto' => 2],
            ['ID' => 8, 'Ripostiglio' => 1, 'Sala' => 1, 'SessoRichiesto' => 'F', 'WiFi' => 1, 'Garage' => 1, 'AngoloStudio' => 1, 'NumeroLocali' => 3,
            'NumBagni' => 1, 'PostiLettoTot' => 3, 'EtaMinima' => 19, 'NumStanzeLetto' => 3],
            ['ID' => 9, 'Ripostiglio' => NULL, 'Sala' => NULL, 'SessoRichiesto' => 'F', 'WiFi' => 0, 'Garage' => NULL, 'AngoloStudio' => 1, 'NumeroLocali' => NULL,
            'NumBagni' => NULL, 'PostiLettoTot' => 1, 'EtaMinima' => 20, 'NumStanzeLetto' => NULL],
            ['ID' => 10, 'Ripostiglio' => NULL, 'Sala' => NULL, 'SessoRichiesto' => 'M', 'WiFi' => 0, 'Garage' => NULL, 'AngoloStudio' => 0, 'NumeroLocali' => NULL,
            'NumBagni' => NULL, 'PostiLettoTot' => 2, 'EtaMinima' => 21, 'NumStanzeLetto' => NULL],
            ['ID' => 11, 'Ripostiglio' => 1, 'Sala' => 1, 'SessoRichiesto' => 'M', 'WiFi' => 1, 'Garage' => 1, 'AngoloStudio' => 1, 'NumeroLocali' => 5,
            'NumBagni' => 3, 'PostiLettoTot' => 4, 'EtaMinima' => 18, 'NumStanzeLetto' => 4],
        ]);

        DB::table('utenti')->insert([
            ['Username' => 'arianna', 'Nome' => 'Arianna', 'Cognome' => 'Agresta', 'Sesso' => 'F', 'DataNascita' => date("2000-04-06"),'role' => 'Locatario',
             'password' => Hash::make('forzainter'),'created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['Username' => 'michele', 'Nome' => 'Michele', 'Cognome' => 'Di Renzo', 'Sesso' => 'M', 'DataNascita' => date("2000-04-06"),'role' => 'Locatario',
             'password' => Hash::make('forzainter'),'created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['Username' => 'joshua', 'Nome' => 'Joshua', 'Cognome' => 'Ciccolini', 'Sesso' => 'M', 'DataNascita' => date("2000-04-06"),'role' => 'Locatario',
             'password' => Hash::make('forzainter'),'created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['Username' => 'marco', 'Nome' => 'Marco', 'Cognome' => 'Ciammaichella', 'Sesso' => 'M', 'DataNascita' => date("2000-04-06"), 'role' => 'Locatore',
             'password' => Hash::make('juventus'),'created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['Username' => 'lorelore', 'Nome' => 'lore', 'Cognome' => 'lore', 'Sesso' => 'M', 'DataNascita' => date("1990-01-01"), 'role' => 'Locatore',
             'password' => Hash::make('17OCquor'),'created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['Username' => 'lariolario', 'Nome' => 'lario', 'Cognome' => 'lario', 'Sesso' => 'M', 'DataNascita' => date("2001-01-01"), 'role' => 'Locatario',
             'password' => Hash::make('17OCquor'),'created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['Username' => 'adminadmin', 'Nome' => 'admin', 'Cognome' => 'admin', 'Sesso' => 'F', 'DataNascita' => date("1980-01-01"), 'role' => 'Admin',
            'password' => Hash::make('17OCquor'),'created_at'=> date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        ]);

        DB::table('interazione')->insert([
            
            ['Username' => 'marco', 'ID' => 1],
            ['Username' => 'marco', 'ID' => 2],
            ['Username' => 'marco', 'ID' => 3],
            ['Username' => 'lorelore', 'ID' => 4],
            ['Username' => 'lorelore', 'ID' => 5],
            ['Username' => 'lorelore', 'ID' => 6],
            ['Username' => 'lorelore', 'ID' => 7],
            ['Username' => 'marco', 'ID' => 8],
            ['Username' => 'lorelore', 'ID' => 9],
            ['Username' => 'marco', 'ID' => 10],
            ['Username' => 'lorelore', 'ID' => 11],
        ]);
        
        DB::table('messaggio')->insert([
        ]);
    }
}
