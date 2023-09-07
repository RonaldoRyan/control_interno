import { newAge, toggleMenu, setupMoreInfoBtns } from './modules/panel.js';
import { showConfirmation } from './modules/alerts.js';

// Obtener edad según fecha de nacimiento en el modal
const birthDate = document.getElementById('birth_date');
const age = document.getElementById('age');

if (birthDate && age) {
  birthDate.addEventListener('change', () => {
    age.value = newAge(birthDate.value);
  });
}

const birthDateModal = document.getElementById('birth_dateModal');
const ageModal = document.getElementById('ageModal');

if (birthDateModal && ageModal) {
  birthDateModal.addEventListener('change', () => {
    ageModal.value = newAge(birthDateModal.value);
  });
}

// Función encargada de desplazar los paneles de información al desplegar el menú
toggleMenu();

// Mostrar los datos de los diferentes registros
setupMoreInfoBtns();

// Mostrar alerta de confirmación
const deleteButtons = document.querySelectorAll('.deleteData');
for (let i = 0; i < deleteButtons.length; i++) {
  deleteButtons[i].addEventListener('click', showConfirmation);
}
