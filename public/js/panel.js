
let birth_date = document.getElementById('birth_date');
let age = document.getElementById('age');


birth_date.addEventListener('change', () => {

    function newAge(birth_date) {

        const today = new Date();
        const birthD = new Date(birth_date);
        let age = today.getFullYear() - birthD.getFullYear();
        const month = today.getMonth() - birthD.getMonth();

        if (month < 0 || (month === 0 && today.getDate() < birthD.getDate())) {
            age--;
        }

        return age;
    }

    age.value = newAge(birth_date.value);
});





function showConfirmation() {
    Swal.fire({
        title: '¿Está seguro que desea eliminar este registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8f001a',
        cancelButtonColor: '#004840',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form").submit();
        }
    });
}


let mainBtns = document.querySelectorAll(".main-btn");

mainBtns.forEach(function(btn) {
  btn.addEventListener("click", function() {
    btn.classList.toggle("active");
  });
});
