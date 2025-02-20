<html>
    <head>
        <title>  GruhSeva message </title>
    </head>
    <body>
        <h1>  GruhSeva message </h1>
        <p> the booking done by you with helper {{$items[1]->name}} {{$items[1]->lastname}} for role {{$items[2]->role}}  on {{\Carbon\Carbon::parse($items[0]->created_at)->format('j F, Y') }} 

            has been {{$items[0]->Acceptedpending}} by helper for address {{$items[3]->address_line_1}} {{$items[3]->address_line_2}} {{$items[3]->city}}</p>
    </body>
</html>