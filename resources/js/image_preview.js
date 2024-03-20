// OPZIONE 1 -- Recupero gli elementi
const input = document.getElementById('image');
const preview = document.getElementById('preview');
const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
const resetButton = document.getElementById('reset-button');

input.addEventListener('input', () => {
    // C'è qualcosa nell'input?.. Se si allora metti il valore dell'input altrimenti il placeholder
    preview.src = input.value || placeholder;
})

// Al click sul reset button reinserisco il placeholder
resetButton.addEventListener('click', () => {
    preview.src = placeholder;
})

// OPZIONE 2 - Non recupero gli elementi ma ho delle variabili globali

// image.addEventListener('input', () => {
// C'è qualcosa nell'input?.. Se si allora metti il valore dell'input altrimenti il placeholder
// preview.src = image.value ? image.value : placeholder;
// })
