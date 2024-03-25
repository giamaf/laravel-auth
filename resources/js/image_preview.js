// OPZIONE 1 -- Recupero gli elementi
const image = document.getElementById('image');
const preview = document.getElementById('preview');
const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
const resetButton = document.getElementById('reset-button');

image.addEventListener('change', () => {
    //! Controllo se è stato caricato un file
    // Se è stato caricato allora...
    if (image.files && image.files[0]) {

        // Prendo il file caricato
        const file = image.files[0];

        // Costruisco un url temporaneo
        const blobUrl = URL.createObjectURL(file);

        // Inserisco il blob nell'src dell'immagine
        preview.src = blobUrl;
    } else {
        // Se NON è stato caricato alcun file allora metti il placeholder
        preview.src = placeholder;
    };
});

// Al click sul reset button reinserisco il placeholder
resetButton.addEventListener('click', () => {
    preview.src = placeholder;
});

//* OPZIONE 2 - Non recupero gli elementi ma ho delle variabili globali
// image.addEventListener('input', () => {
// C'è qualcosa nell'input?.. Se si allora metti il valore dell'input altrimenti il placeholder
// preview.src = image.value ? image.value : placeholder;
// })
