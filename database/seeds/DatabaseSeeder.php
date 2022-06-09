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
        ]);

        DB::table('alloggio')->insert([
            ['Citta' => 'Ancona', 'Via' => 'Brecce Bianche', 'NumCivico' => '16', 'Costo' => 300, 'PeriodoInizio' => date("2022-05-05"),
             'PeriodoFine' => date("2022-07-08"), 'Metratura' => 500, 'NumOpzionate' => 1, 'Disponibilita' => 1,'Descrizione' => "Appartamento in zona tranquilla, a due passi dall'università di Ancona. 
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
        ]);

        DB::table('caratteristiche')->insert([
            ['ID' => 1, 'Ripostiglio' => 0, 'Sala' => 1, 'SessoRichiesto' => 'M', 'WiFi' => 1, 'Garage' => 0, 'AngoloStudio' => 1, 'NumeroLocali' => 4,
            'NumBagni' => 1, 'PostiLettoTot' => 3, 'EtaMinima' => 18, 'NumStanzeLetto' => 2],
            ['ID' => 2, 'Ripostiglio' => NULL, 'Sala' => NULL, 'SessoRichiesto' => 'F', 'WiFi' => 1, 'Garage' => NULL, 'AngoloStudio' => 1, 'NumeroLocali' => NULL,
            'NumBagni' => NULL, 'PostiLettoTot' => NULL, 'EtaMinima' => 18, 'NumStanzeLetto' => NULL],
            ['ID' => 3, 'Ripostiglio' => NULL, 'Sala' => NULL, 'SessoRichiesto' => 'M', 'WiFi' => 1, 'Garage' => NULL, 'AngoloStudio' => 0, 'NumeroLocali' => NULL,
            'NumBagni' => NULL, 'PostiLettoTot' => NULL, 'EtaMinima' => 18, 'NumStanzeLetto' => NULL],
            ['ID' => 4, 'Ripostiglio' => 1, 'Sala' => 0, 'SessoRichiesto' => 'M', 'WiFi' => 1, 'Garage' => 0, 'AngoloStudio' => 1, 'NumeroLocali' => 4,
            'NumBagni' => 2, 'PostiLettoTot' => 2, 'EtaMinima' => 18, 'NumStanzeLetto' => 3],
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
            ['Username' => 'arianna', 'ID' => 1],
        ]);
        
        DB::table('messaggio')->insert([
        ]);
    }
}
