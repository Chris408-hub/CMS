

export function ajaxData() {

    const form = document.querySelector('#send-message');
    const feedBack = document.querySelector('#feedback');

    const closeBtn = document.querySelector('#close-btn');
    const lightbox = document.querySelector('#thanks-light-box');

    function sendData(e) {
        e.preventDefault(); 
        const url = 'sendmsg.php';
        const thisForm = e.currentTarget;
        console.log(thisForm.elements);
        const formdata =
            "firstname=" + thisForm.elements.firstname.value +
            "&lastname=" + thisForm.elements.lastname.value +
            "&email=" + thisForm.elements.email.value +
            "&messages=" + thisForm.elements.messages.value;
        console.log(formdata);

       
        // AJAX 
        fetch(url, {
            method: 'POST',
            headers: { "Content-Type": "application/x-www-form-urlencoded"},

            body: formdata
        })
        .then(response => response.json())
            .then(data => {
                // console.log(data);
                lightbox.style.display = 'block';
                form.reset();
                 if (data.errors===true) {
                    data.errors.forEach(error => {
                        const errorElement = document.createElement("p");
                        errorElement.textContent = error;
                        feedBack.appendChild(errorElement);
                    })
                }

            })
            .catch(); 
        

    }

    form.addEventListener('submit', sendData); 

    // close lightbox

    function closePage() {
        lightbox.style.display = 'none';
    }

     closeBtn.addEventListener('click', closePage);
    

}

