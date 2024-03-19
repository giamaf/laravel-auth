//# OPERAZIONI PRELIMINARI
const deleteButton = document.getElementById('delete-button')
const deleteForm = document.getElementById('delete-form');
const modal = document.getElementById('modal');
const modalButtons = document.querySelectorAll('.modal-buttons');

//# FUNZIONI
const isVisible = () => {
    // Faccio apparire la modale
    modal.classList.add('d-block');
    modal.classList.toggle('fade');
};

const isHidden = () => {
    // Faccio sparire la modale
    modal.classList.toggle('fade');
    modal.classList.remove('d-block');
};

const deleteClicked = () => {
    // Al click sul tasto cancella...
    deleteButton.addEventListener('click', () => {
        // Mostro la modale
        isVisible();
    })
}

//* LOGICA
// Al click sul tasto cancella appare la modale...
deleteClicked();

// Per ogni tasto all'interno della modale
modalButtons.forEach(button => {

    // Al click su un tasto all'interno della modale
    button.addEventListener('click', () => {

        // Recupero il value del tasto per capire cosa fare
        const buttonValue = button.value;

        // Se l'utente clicca su conferma allora invio il form..
        if (buttonValue === 'confirm') deleteForm.submit();

        // Se l'utente clicca su back o su exit allora la modale sparisce
        if (buttonValue !== 'confirm') isHidden()
    })
});