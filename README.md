# REST API Backend
### Accetta richieste HTTP con:
* Header `token` con il JWT ottenuto dalla funzione `login`
* Unico form con metodo POST che specifica un campo con chiave `cmd` e valore la stringa del comando da eseguire; è possibile inoltre passare parametri ulteriori