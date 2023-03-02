<x-login-layout doctitle="Edit Profile">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Profile</h1>

    <div class="container py-md-5 container--narrow">
        <form action="/profile/{{auth()->user()->id}}" method="POST">
          @csrf
          @method('PUT')
          {{-- AVATAR --}}
          <div class="form-group">
            <label for="profile-name" class="text-muted mb-1"><small>Avatar</small></label>
            <br>
            <input name="avatar" id="user-avatar" type="file" autocomplete="off" />
            @error('name')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>


          {{-- NAME --}}
          <div class="form-group">
            <label for="profile-name" class="text-muted mb-1"><small>Name</small></label>
            <input value="{{auth()->user()->name}}" name="name" id="user-name" class="form-control form-control-lg form-control-title" type="text" placeholder="{{auth()->user()->name}}" autocomplete="off" />
            @error('name')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          {{-- E-MAIL --}}
          <div class="form-group">
            <label for="profile-email" class="text-muted mb-1"><small>E-Mail</small></label>
            <input value="{{auth()->user()->email}}" name="email" id="user-email" class="form-control form-control-lg form-control-title" type="text" placeholder="{{auth()->user()->email}}" autocomplete="off" />
            @error('email')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          {{-- STREET --}}
          <div class="form-group">
            <label for="profile-street" class="text-muted mb-1"><small>Street</small></label>
            <input value="{{auth()->user()->street}}" name="street" id="user-street" class="form-control form-control-lg form-control-title" type="text" placeholder="{{auth()->user()->street}}" autocomplete="off" />
            @error('street')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          {{-- HOUSENUMBER --}}
          <div class="form-group">
            <label for="profile-houseNumber" class="text-muted mb-1"><small>Housenumber</small></label>
            <input value="{{auth()->user()->houseNumber}}" name="houseNumber" id="user-houseNumber" class="form-control form-control-lg form-control-title" type="text" placeholder="{{auth()->user()->houseNumber}}" autocomplete="off" />
            @error('houseNumber')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          {{-- ZIPCODE --}}
          <div class="form-group">
            <label for="profile-zipcode" class="text-muted mb-1"><small>Zipcode</small></label>
            <input value="{{auth()->user()->zipcode}}" name="zipcode" id="user-zipcode" class="form-control form-control-lg form-control-title" type="text" placeholder="{{auth()->user()->zipcode}}" autocomplete="off" />
            @error('zipcode')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          {{-- COUNTRY --}}
          <div class="form-group">
            <label for="profile-country" class="text-muted mb-1"><small>Country</small></label>
            <input value="{{auth()->user()->country}}" name="country" id="user-country" class="form-control form-control-lg form-control-title" type="text" placeholder="{{auth()->user()->country}}" autocomplete="off" />
            @error('country')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          {{-- PHONE --}}
          <div class="form-group">
            <label for="profile-phone" class="text-muted mb-1"><small>Phonenumber</small></label>
            <input value="{{auth()->user()->phone}}" name="phone" id="user-phone" class="form-control form-control-lg form-control-title" type="text" placeholder="{{auth()->user()->phone}}" autocomplete="off" />
            @error('phone')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>
  

          <p><small><strong><a href="/profile/{{auth()->user()->id}}">&laquo; Back to Profile</a></strong></small></p>
          <button class="btn btn-primary" type="submit">Save Changes</button>
          {{-- <button type="submit" class="btn btn-primary">Save Changes</button> --}}
        </form>
      </div>
</body>
</html>
</x-login-layout>