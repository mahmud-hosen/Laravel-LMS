window.addEventListener('show-delete-confirmation', event => {
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Delete !'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('deleteConfirmed')
        }
    })
});

//category-delete-success
window.addEventListener('delete_success', event => {
    Swal.fire(
        'Deleted!',
        'Data has been deleted successfully.',
        'success'
    )
});