import Swal from 'sweetalert2';
const swalModal = {

    modalSwals: document.querySelector('.SweetAlert2'),
    modalform : document.querySelector('#delete-form' ),

    init() {
       // this.initDeleteItems();
        this.initMenuItems();
    },
     initMenuItems() {

        const buttons = document.querySelectorAll('.SweetAlert2');
        buttons.forEach((button) => {
            //const sectionId = button.dataset.sectionid;
            button.addEventListener('click', (e) => this.confirmDelete(e));
        });




        // if (this.modalSwals.length) {
        //     this.modalSwals.forEach((modalSwal) => {

        //         console.log("i am here");

        //         modalSwal.addEventListener('click', (e) => {
        //             e.preventDefault();

        //             Swal.fire({
        //                 title: 'Are you sure?',
        //                 text: 'You will not be able to recover this data!',
        //                 icon: 'warning',
        //                 showCancelButton: true,
        //                 confirmButtonColor: '#d33',
        //                 cancelButtonColor: '#3085d6',
        //                 confirmButtonText: 'Yes, delete it!',
        //               })

        //           });


        //     });
        // }
    },

     confirmDelete(event) {

        event.preventDefault();


        const button = event.target;
       // const sectionId = button.dataset.sectionId; // Access the 'data-sectionid' attribute

        Swal.fire({
            text: 'Are you sure you want to delete?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f4405f',
            cancelButtonColor: '#e4e7eb',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, Cancel',
            showCloseButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms the deletion, submit the form
                this.modalform.submit();
              //  var form = document.querySelector('delete-form-' + sectionId);
              //  console.log(form);
              // document.getElementById('delete-form-' + sectionId).submit();
            }
        });
    }
}
export default swalModal;
