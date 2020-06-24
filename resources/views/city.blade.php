<html> 
    <head>
        <title>Check weather data!</title>
    </head>
    <body>
        <form action="{{url('check-weather')}}" method="POST">{{ csrf_field() }}
            <input type="text" name="city_name" placeholder="Enter City Name"> 
            <input type="submit"  name="check">
        </form>
    </body>
</html>