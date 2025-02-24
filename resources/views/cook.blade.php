@extends('layout.master')
@section('container')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Enter the details given</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                
            </ol>
        </nav>
    </div>
</div>
        
          
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">


                        
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="position-relative rounded w-100 h-100" src="/img/cooker.jpg" alt="Map Placeholder" style="min-height: 350px; object-fit: cover;">
                    </div>
                <div class="col-md-6">
               
    <form method="GET" action="{{ route('udcook.build') }}">
            
        <!-- Select type of cooking -->
        <div class="mb-3">
            <label for="occasion" class="form-label">Enter the type of cooking</label>
            <select name="occasion" id="occasion" class="form-control">
                <option> select</option>
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
                <option> select</option>
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
                textarea.setAttribute('placeholder', `eg paneer pulav for lunch ,mention meal name and food name`);
                textarea.classList.add('form-control');

                // Append label and textarea to the container
                container.appendChild(label);
                container.appendChild(textarea);
                container.appendChild(document.createElement('br')); // Add a line break after each textarea
            }
        }
    });
</script>

</div>
</div>
</div>
</div>
    @endsection