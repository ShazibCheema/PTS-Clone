<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTS Contact Form</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Articles-Cards-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-With-Button-icons.css">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/custom_css.css">
    <link rel="shortcut icon" href="./assets/IMG/logo1.jpg" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-md bg-primary py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="text-light">PTS Contact Form</span></a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div id="navcol-2" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active link-light" href="./ContactForm.php">PTS Contact Form</a></li>
                    <li class="nav-item"><a class="nav-link link-light" href="./TrackContactForm.php">Track Contact Form</a></li>
                </ul><a class="btn btn-light link-dark ms-md-2" role="button" href="./index.php">Go to pts</a>
            </div>
        </div>
    </nav>
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
      
                            <form id="myForm" action="./PHP/add.php" method="post">
                                <div class="mb-3">
                                    <select name="subject" id="subject" class="form-control" required>
                                        <option value="" disabled selected>Select Subject</option>
              
                                    <option >Information</option>
                                    <option>Inquiry</option>
                                  </select></div>
                                <div class="mb-3"><select name="category" id="category" class="form-control" required>
                                    <option value="" disabled selected>Select Category</option>
                
                                    <option>General</option>
                                    <option>Marketing</option>
                                  </select></div>
                                <div class="mb-3"><input id="name-2" class="form-control" type="text" name="name" placeholder="Name"  required/></div>
                                <div class="mb-3"><input id="fname" class="form-control" type="text" name="fname" placeholder="Father Name"  required/></div>
                                <div class="mb-3"><input type="date" class="form-control" name="date" id="date" required></div>
                                <div class="mb-3"><input type="text" class="form-control" name="CNIC" id="CNIC" placeholder="CNIC (without dashes)" required>
                                    <div id="cnicLengthMessage" class="text-danger"></div>

                                </div>
                                <div class="mb-3"><input type="text" class="form-control" name="reference" id="reference" placeholder="Reference Number / Form Number / Roll Number" required></div>
                                <div class="mb-3"><input id="email-2" class="form-control" type="email" name="email" placeholder="Email Adress(Optional)" /></div>
                                <div class="mb-3"><input type="number" class="form-control" name="Contact" id="Contact" placeholder="Contact Number" required></div>
                                <div class="mb-3"><input type="text" class="form-control" name="address" id="address" placeholder="Postal Adress" required></div>
                                <div class="mb-3"><input type="text" class="form-control" name="Projectname" id="Projectname" placeholder="Project Name & Code" required></div>
                                <div class="mb-3"><textarea id="message-2" class="form-control" name="message" rows="6" placeholder="Description [Max 100 words]" required></textarea>
                                <div id="wordcount" class="visually-hidden">
                                    <p class="text-danger">Word count: <span class="text-danger" id="wordCount">0</span></p>
                                </div>

                            </div>
                                <div><button id="submitbtn" class="btn btn-primary d-block w-100 " type="submit" value="submit" onclick="submitform()">Send </button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <div class="container text-muted py-4 py-lg-5">
            <ul class="list-unstyled d-flex flex-column align-items-start">
                <li class="list-inline-item me-4">Pakistan Testing Service</li>
                <li class="list-inline-item me-4">PTS Head Quarters, 3rd Floor, Adeel Plaza, Fazal-e-Haq Road, Blue Area, Islamabad</li>
                <li class="list-inline-item"><a class="link-secondary text-primary" href="tel:+9251111111787">+92 51 111 111 787</a></li>
                <li><a class="link-secondary text-primary" href="#"></a>www.pts.org.pk</li>
            </ul>
            <p class="mb-0">© Copyright 2021 - Pakistan Testing Service - PTS (Designed by PTS-IT Department) I Privacy Policy</p>
        </div>
    </footer>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
         function countWords(str) {
            str = str.trim();

            const words = str.split(/\s+/);

            const nonEmptyWords = words.filter(word => word.length > 0);

            return nonEmptyWords.length;
        }

        document.getElementById('message-2').addEventListener('input', function () {
            const inputText = this.value;
            const wordCount = countWords(inputText);
            let a = document.getElementById("wordcount");
            if(wordCount==0){
                a.classList.add("visually-hidden");
            }else{
                a.classList.remove("visually-hidden");
            }

        const textInput = document.getElementById('message-2');
        const wordCountDisplay = document.getElementById('wordCount');
        const maxWordCount = 100;

        textInput.addEventListener('input', function () {
            const inputText = this.value;
            const wordCount = countWords(inputText);

            // Display the word count
            wordCountDisplay.textContent = wordCount;

            // Prevent typing more words when the limit is reached
            if (wordCount >= maxWordCount) {
                this.addEventListener('keydown', preventTyping);
            } else {
                this.removeEventListener('keydown', preventTyping);
            }
        });

        // Function to prevent typing when the word limit is reached
        function preventTyping(event) {
            const inputText = textInput.value;
            const wordCount = countWords(inputText);

            // Allow backspace (code 8) and delete (code 46) keys
            if (event.keyCode !== 8 && event.keyCode !== 46) {
                event.preventDefault();
            }

            // Remove the event listener if the word count is less than the limit
            if (wordCount < maxWordCount) {
                textInput.removeEventListener('keydown', preventTyping);
            }
        } 

        });


        document.getElementById('myForm').addEventListener('input', function () {
            validateForm();
        });

        document.getElementById('myForm').addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Form submitted!');
        });

        function validateForm() {
    const cnicInput = document.getElementById('CNIC');
    const cnicLengthMessage = document.getElementById('cnicLengthMessage');
    const submitButton = document.getElementById('submitbtn');

    // Validate CNIC length
    if (cnicInput.value.length == 0) {
        cnicLengthMessage.textContent = '';
    } else if (cnicInput.value.length != 13) {
        cnicLengthMessage.textContent = 'CNIC must be 13 characters long';
    } else {
        cnicLengthMessage.textContent = '';
    }

    // Check if all required fields are filled
    const requiredInputs = document.querySelectorAll('input[required], select[required]');
    let allFieldsFilled = true;

    requiredInputs.forEach(input => {
        if (!input.value.trim()) {
            allFieldsFilled = false;
        }
    });

    submitButton.disabled = !allFieldsFilled || cnicInput.value.length !== 13;

    // Check if the form should be submitted
   
}

function submitform(){
        document.getElementById('myForm').submit();
}


    </script>


</body>
</html>