<!DOCTYPE html>

<html>

<head>

    <title>Digital System Alert</title>

</head>

<body>

    <p>Hello Digital Department</p>


@foreach ($test as $object)
<p>The website{{ $object->name }} is going to expire on {{$object->expiry}} please make arrangements to pay to avoid termination of services.</p>
@endforeach

<p>Kind Regards<br>Digital Bot</p>

</body>

</html>