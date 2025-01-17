<!-- This is the main generic view of your application, it's not required to use it -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <h1>Welcome to MVC Pattern Basics!</h1>
    <div class="list-group">
        <a class="list-group-item list-group-item-action" href="?controller=employee&action=getAllEmployees">Employee Controller</a>
    </div>
    <div class="list-group">
        <a class="list-group-item list-group-item-action" href="?controller=department&action=getAllDepartments">Department Controller</a>
    </div>
</body>

</html>