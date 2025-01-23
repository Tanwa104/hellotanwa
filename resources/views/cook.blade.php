<html> 
    <head> <title> Enter more details </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </head>
    <body>
        <form>
            <div class="col-md-12">
            <label for="occasion" class="form-label">Enter the type of cooking</label>
            <span id="occasion" class="form-control">
            <select>
                <option value="normal">day to day cooking</option>
                <option value="special">small occassion</option> 
            </select> 
            </span><br><br>
            <label for="peopleno" class="form-label">Enter the number of people you have</label>
            <input type="text" name="peopleno" id="peopleno" class="form-control"/>
            <br>
            <label for="cus" class="form-label">Enter the type of cusine</label>
            <span id="cus" class="form-control">
            <select>
                <option value="normal">Indian</option>
                <option value="multi">Multicusine</option> 
            </select>
            </span> <br><br>
            <label for="meals" class="form-label">Enter  the number of meals you want to prepare</label>
            <input type="text" name="items" id="meals" placeholder="eg Breakfast,lunch,etc" class="form-control"/>
<br><br>            <label for="desc" class="form-label">Give description of each meal </label>
            <textarea rows="5" class="form-control" id="desc" cols="40" placeholder="enter the types of dishes you want in each meals"></textarea>             
    </body>
</html>