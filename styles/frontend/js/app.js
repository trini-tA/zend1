


(function() {
    
    $('.todo-list').on( 'click', '.btn-delete', function(e){
        

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                // delete request
                const todo_id = $(this).attr( 'data-id');
                axios.delete( $(this).attr( 'data-href') )
                    .then(function (response) {
                        
                        if( response.data.code === 1 ){
                            $('#todo-' + todo_id ).remove();
                            // handle success
                            Swal.fire(
                                'Deleted!',
                                'Your todo has been deleted.',
                                'success'
                            );
                        } else {
                            // handle success
                            Swal.fire(
                                'Deleted!',
                                response.data.msg,
                                'error'
                            );
                        }
                        
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
                
            }
          })

    })
    
    

})();