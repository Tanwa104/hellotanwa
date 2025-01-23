<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter more details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <form method="GET" action="{{ route('udcook.build') }}">
            
            <!-- Select type of cooking -->
            <div class="mb-3">
                <label for="occasion" class="form-label">Enter the type of cooking</label>
                <select name="occasion" id="occasion" class="form-control">
                    <option value="normal">Day to day cooking</option>
                    <option value="special">Small occasion</option>
                </select>
            </div>

            <!-- Number of people -->
            <div class="mb-3">
                <label for="peopleno" class="form-label">Enter the number of people you have</label>
                <input type="number" name="peopleno" id="peopleno" class="form-control" required/>
            </div>

            <!-- Cuisine type -->
            <div class="mb-3">
                <label for="cus" class="form-label">Enter the type of cuisine</label>
                <select name="cus" id="cus" class="form-control">
                    <option value="normal">Indian</option>
                    <option value="multi">Multicuisine</option>
                </select>
            </div>

            <!-- Number of meals to prepare -->
            <div class="mb-3">
                <label for="meals" class="form-label">Enter the number of meals you want to prepare</label>
                <input type="number" name="meals" id="meals" class="form-control" required/>
            </div>

            <!-- Dynamic meal descriptions -->
            <div id="mealDescriptionContainer" class="mb-3"></div>

            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>

    <script>
        // Listen for input change in the 'meals' field to generate textareas dynamically
        document.getElementById('meals').addEventListener('input', function() {
            const numMeals = parseInt(this.value);
            const container = document.getElementById('mealDescriptionContainer');
            container.innerHTML = ''; // Clear any previous textareas

            if (numMeals > 0) {
                for (let i = 1; i <= numMeals; i++) {
                    // Create a label for each textarea
                    const label = document.createElement('label');
                    label.setAttribute('for', `mealDesc${i}`);
                    label.innerText = `Description for Meal ${i}:`;

                    // Create the textarea
                    const textarea = document.createElement('textarea');
                    textarea.setAttribute('name', `mealDescription[${i}]`); // Name to capture as an array
                    textarea.setAttribute('id', `mealDesc${i}`);
                    textarea.setAttribute('rows', '5');
                    textarea.setAttribute('cols', '40');
                    textarea.setAttribute('placeholder', `Enter the description for Meal ${i}`);
                    textarea.classList.add('form-control');

                    // Append label and textarea to the container
                    container.appendChild(label);
                    container.appendChild(textarea);
                    container.appendChild(document.createElement('br')); // Add a line break after each textarea
                }
            }
        });
    </script>
</body>
</html>
