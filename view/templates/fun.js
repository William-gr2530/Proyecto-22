function fu(id){
    swal({
        title: "Quire eliminar el registro?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Eliminando registro", {
            icon: "success",
          });
        } else {
          swal("Se a canselado la accion");
        }
      });
  }





