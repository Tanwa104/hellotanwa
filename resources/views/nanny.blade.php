<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter more details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>
<body>
    <form method="GET" action="{{ route('udnanny.build') }}">
        <div class="col-md-12">
            <label for="childno" class="form-label">Enter the number of children</label>
            <input type="number" name="childno" id="childno" class="form-control" min="1"/>
            <br> <!-- Added line break for better spacing -->
            <div id="container"></div>
            <input type="submit" value="submit"/>
        </div>
   
        <script>
            // Get the input element for number of children
            document.getElementById('childno').addEventListener('input', function() {
        const numChildren = parseInt(this.value);
        const container = document.getElementById('container');
        container.innerHTML = ''; // Clear previous fields

        for (let i = 0; i < numChildren; i++) {
            // Create the inputs for Name, Age, and Gender
            const nameInput = document.createElement('input');
            nameInput.type = 'text';
            nameInput.name = `Name[${i}]`; // Name array input
            nameInput.placeholder = `Child ${i + 1} Name`;

            const ageInput = document.createElement('input');
            ageInput.type = 'number';
            ageInput.name = `Age[${i}]`; // Age array input
            ageInput.placeholder = `Child ${i + 1} Age`;

            const genderInput = document.createElement('input');
            genderInput.type = 'text';
            genderInput.name = `Gender[${i}]`; // Gender array input
            genderInput.placeholder = `Child ${i + 1} Gender`;

            container.appendChild(nameInput);
            container.appendChild(ageInput);
            container.appendChild(genderInput);
            container.appendChild(document.createElement('br')); // Line break
        }
    });
</script>
    </form> 
</body>
</html>
