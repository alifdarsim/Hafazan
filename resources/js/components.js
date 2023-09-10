import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"
import Swal from 'sweetalert2'

export const Toast = {
    setText: (text, colorHex) => {
        Toastify({
            text: text,
            duration: 2000,
            gravity: "bottom", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: colorHex ? colorHex : "#466ce5",
                borderRadius: "10px", // Adjust the radius as needed
                paddingTop: "8px",
                paddingBottom: "8px",
            }
        }).showToast();
    }
}

export const Swala = {
    trigger: (content) => {
        return new Promise((resolve, reject) => {
            let defaultContent = {
                title: content.title,
                text: content.text,
                confirmButtonText: 'Yes',
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                reverseButtons: true,
                width: '90%',
                customClass: {
                    cancelButton: 'me-1 btn !min-w-[7rem] !rounded-full',
                    confirmButton: 'ms-1 btn !min-w-[7rem] !rounded-full',
                    popup: 'relative max-w-md rounded-lg bg-white pt-10 pb-4 text-center dark:bg-navy-700 pt-2',
                    title: 'text-lg text-slate-800 dark:text-navy-50',
                    htmlContainer: '!overflow-hidden !text-sm text-slate-500 dark:text-navy-200',
                    input: 'text-sm text-slate-800 dark:text-navy-50',
                }
            }
            defaultContent = {...defaultContent, ...content}
            Swal.fire(defaultContent)
                .then((result) => {
                    // Resolve the promise with the result
                    resolve(result);
                })
                .catch((error) => {
                    // Reject the promise with the error
                    reject(error);
                });
        });
    }
}

export default Toast;

