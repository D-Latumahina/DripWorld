<x-login-layout>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>profile page</h1>
    <hr>
    <div>
    <label for="profile-name" class="text-muted mb-1"><small>Name</small><h5>{{auth()->user()->name}}</h5></label>
    </div>
    <div>
    <label for="profile-email" class="text-muted mb-1"><small>E-Mail</small><h5>{{auth()->user()->email}}</h5></label>
    </div>
    <div>
        <label for="profile-phone" class="text-muted mb-1"><small>Phonenumber</small><h5>{{auth()->user()->phone}}</h5></label>
    </div>
    <div>
        <label for="profile-street" class="text-muted mb-1"><small>Street</small><h5>{{auth()->user()->street}}</h5></label>
    </div>
    <div>
        <label for="profile-houseNumber" class="text-muted mb-1"><small>Housenumber</small><h5>{{auth()->user()->houseNumber}}</h5></label>
    </div>
    <div>
        <label for="profile-zipcode" class="text-muted mb-1"><small>Zipcode</small><h5>{{auth()->user()->zipcode}}</h5></label>
    </div>
    <div>
        <label for="profile-country" class="text-muted mb-1"><small>Country</small><h5>{{auth()->user()->country}}</h5></label>
    </div>
    <br>
   <a href="/profile/{{auth()->user()->id}}/edit"> <button class="btn-small btn-dark"> Edit Profile </button> </a>
</body>
</html>
</x-login-layout>