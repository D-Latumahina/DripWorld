<x-login-layout>
    <div class="container py-md-5">
        <div class="row align-items-center">
          <div class="col-lg-7 py-3 py-md-5">
            <h1 class="display-3">Login</h1>
            {{-- <p class="lead text-muted">Are you sick of short tweets and impersonal &ldquo;shared&rdquo; posts that are reminiscent of the late 90&rsquo;s email forwards? We believe getting back to actually writing is the key to enjoying the internet again. Our users have authored posts.</p> --}}
          </div>
          <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
            <form action="/login" method="post" id="login-form">
              @csrf
              <div class="form-group">
                <label for="login-email" class="text-muted mb-1"><small>Email</small></label>
                    <input name="loginemail" class="form-control" type="text" placeholder="Email" autocomplete="off" />
                @error('email')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>
  
              <div class="form-group">
                <label for="login-password" class="text-muted mb-1"><small>Password</small></label>
                    <input name="loginpassword" class="form-control" type="password" placeholder="Password" />
                @error('password')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>
              <br>
              <button type="submit" class="py-3 mt-4 btn btn-lg btn-dark btn-block">Log in</button>
            </form>
          </div>
        </div>
      </div>
  </x-login-layout>