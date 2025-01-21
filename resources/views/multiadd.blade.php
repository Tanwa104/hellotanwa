<html>
    <head> <title>multiple areas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </head>
    <body style="background-color: lavender">
        <form method="GET" action="{{route('area.fill')}}">
            <div class="col-lg-12 p-3 p-lg-5 pt-lg-3" style="background-color: white;margin-top:3%">
                <div class="text-center">
            <label for="textbox-count">Enter the number of cities: </label>
            <input type="number" name="textbox-count" id="textbox-count" min="1" placeholder="Number of textboxes" ><br><br>
            <button onclick="addTextboxes()">Enter areas</button><br><br>
        
            <div id="textbox-container" class="textbox-container"></div><br><br>

            <input type="submit" value="submit"/>
            </div>
            </div>
            <script>
                function addTextboxes() {
                    // Get the number of textboxes to create
                    event.preventDefault();
                    const count = document.getElementById('textbox-count').value;
                    const container = document.getElementById('textbox-container');
                    
                    // Clear the container before adding new textboxes
                    container.innerHTML = '';
                    
                    // Add the specified number of textboxes
                    for (let i = 0; i < count; i++) {
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.name=`city[${i}]`;
                        input.placeholder = `Area ${i + 1}`;
                        container.appendChild(input);
                        container.appendChild(document.createElement('br'));  // Adding line breaks for better layout
                    }
                }
            </script>

            <div></div>
        
        </form>
    </body>
</html>