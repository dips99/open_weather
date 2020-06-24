<html> 
    <head>
        <title>Check Palindrome</title>
    </head>
    <body>
    <form action="{{url('check-palindrome')}}" method="POST">@csrf
        <input type="text" name="str_palindrome" placeholder="Enter to check palindrome">
        <input type="submit" name="check">
    </form>
    </body>
</html>