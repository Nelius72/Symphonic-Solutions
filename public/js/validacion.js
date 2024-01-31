
    

// Obtener el formulario y los campos obligatorios
const form = document.querySelector('form');
const requiredFields = form.querySelectorAll('[required]');

// Agregar un evento "submit" al formulario
form.addEventListener('submit', function(event) {
  // Verificar si hay algún campo obligatorio vacío
  let hasEmptyFields = false;
  requiredFields.forEach(function(field) {
    if (!field.value) {
      hasEmptyFields = true;
      
    }
  });

  // Si hay algún campo vacío, cancelar el envío del formulario y mostrar un mensaje de error
  if (hasEmptyFields) {
    
    event.preventDefault();
    alert('Por favor complete todos los campos obligatorios.');
  }
});
