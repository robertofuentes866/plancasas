@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var tableElements = document.querySelectorAll(".formulario_eliminar");
        tableElements.forEach(function(element) {
                                element.addEventListener("submit", function(e) {
                                e.preventDefault();
                                Swal.fire({
                                            title: 'Seguro desea eliminar registro ?',
                                            text: "Accion sin reversion!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Si, eliminar!',
                                            cancelButtonText: 'Cancelar!'
                                            }).then((result) => {
                                            if (result.isConfirmed) {
                                                element.submit()
                                            }
                                        })
                            });
                        });

    </script>
@endsection