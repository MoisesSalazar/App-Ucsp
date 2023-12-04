// Get DOM Elements
const modalBtns = document.querySelectorAll('.modal-btn');
const modals = document.querySelectorAll('.modal');
const closeBtns = document.querySelectorAll('.close');

// Attach event listeners to modal buttons
modalBtns.forEach((btn) => {
    btn.addEventListener('click', openModal);
});

// Attach event listeners to close buttons
closeBtns.forEach((btn) => {
    btn.addEventListener('click', closeModal);
});

// Open the corresponding modal
function openModal(e) {
    const modalId = e.target.getAttribute('data-modal-target');
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'block';
    }
}

// Close the corresponding modal
function closeModal() {
    modals.forEach((modal) => {
        modal.style.display = 'none';
    });
}

// Close modal if clicked outside
window.addEventListener('click', outsideClick);

function outsideClick(e) {
    if (e.target.classList.contains('modal')) {
        e.target.style.display = 'none';
    }
}
