
export function showConfirmation(event) {
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
        var form = event.target.closest("form");
        form.submit();
      }
    });
  }