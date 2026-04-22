// 1. Basic Store Function (Standard POST)
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
function store(url, data) {
    axios.post(url, data)
       .then(function (response) {
        showMessage(response.data);
        clearForm();
        clearAndHideErrors();
        
       })
       .catch(function (error) {
        if (error.response.data.errors !== undefined) {
            showErrorMessages(error.response.data.errors);
        }
        else {
           showMessage(error.response.data);
        }
        
       }

       );
}

// 2. Store with Redirect (Used for Create page)
function storeRedirect(url, data, redirectUrl) {
    axios.post(url, data)
        .then(function (response) {
            showMessage(response.data); 
            setTimeout(() => {
                window.location.href = redirectUrl; 
            }, 1000);
        })
        .catch(function (error) {
            handleError(error);
        });
}


function storeRoute(url, data, redirectUrl) {
    axios.post(url, data)
        .then(function (response) {
            Swal.fire({
                icon: response.data.icon || 'success',
                title: response.data.title || 'Done',
                showConfirmButton: false,
                timer: 1500
            });

            if (redirectUrl) {
                setTimeout(() => {
                    window.location.href = redirectUrl;
                }, 1500);
            }
        })
        .catch(function (error) {
            Swal.fire({
                icon: 'error',
                title: error.response.data.title || 'Error',
                text: error.response.data.message || 'Something went wrong!'
            });
        });
}

function update(url, data) {
    axios.put(url, data)
        .then(function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Updated!',
                text: response.data.message || 'Data modified successfully',
                showConfirmButton: false,
                timer: 1500
            });
        })
        .catch(function (error) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error.response.data.message || 'Something went wrong!'
            });
        });
}


function destroy(url, reference) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            
            axios.delete(url)
                .then(function (response) {

                   Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: response.data.message || 'Record has been deleted.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    
                    reference.closest('tr').remove();
                })
                .catch(function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error.response.data.message || 'Something went wrong!'
                    });
                });
        }
    });
}
function showMessage(data) {
    Swal.fire({
        icon: data.icon || 'success',
        title: data.title || 'Notification',
        text: data.text || data.message,
        timer: 2000,
        showConfirmButton: false
    });
}

function handleError(error) {
    if (error.response && error.response.status === 422) {
      
        showErrorMessages(error.response.data.errors);
    } else {
        showMessage(error.response.data);
    }
}
function showErrorMessages(errors) {
    let errorText = Object.values(errors).flat().join('<br>');
    Swal.fire('Validation Error', errorText, 'error');
}
