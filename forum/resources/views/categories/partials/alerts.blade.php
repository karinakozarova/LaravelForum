@if (Session::has('success'))
    <script>
        let timerInterval
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            timer: 1500,
            timerProgressBar: true,
            onBeforeOpen: () => {
                timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 100)
            },
            onClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
        })
    </script>
@endif

@if (Session::has('errors'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ implode(", ", $errors->all()) }}',
        })
    </script>
@endif