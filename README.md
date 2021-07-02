# REST API Backend
### Accetta richieste HTTP con:
* Header `token` con il JWT ottenuto dalla funzione `login`
* Unico form con metodo POST che specifica un campo con chiave `cmd` e valore la stringa del comando da eseguire; è possibile inoltre passare parametri ulteriori

### Per iniziare
* Modificare il config con una connessione MySQL valida
* Creare una tabella Utenti dello schema (id,Nome,Cognome,Email,Ruolo) così da poter permettere la creazione del JWT al login

### Docker
Il `Dockerfile` crea una immagine con PHP e lo avvia come webserver sulla porta 8000 interna.
