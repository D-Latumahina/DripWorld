<x-login-layout>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
       <center> <h1>Sell page</h1> </center>

       <hr>

        <div class="container py-md-5 container--narrow">
            <form action="/sell" method="POST">
                @csrf
                {{-- NAME --}}
                <div class="form-group">
                  <label for="example">Name</label>
                  <input type="item_name" id="item_name" name="item_name" class="form-control" required="">
                @error('item_name')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>

              {{-- DESCRIPTION --}}
              <div class="form-group">
                  <label for="example">Description</label>
                  <textarea type="item_description" id="item_description" name="item_description" class="form-control" required=""> </textarea> 
                @error('item_description')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>

                {{-- CATEGORY --}}
                <div class="form-group">
                    <label for="example">Category</label>
                    <br>
                    <select type="item_category" id="item_category" name="item_category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                      <option type="item_category" id="item_category" name="item_category" value="1">Sneakers</option>
                      <option type="item_category" id="item_category" name="item_category" value="2">T-Shirts</option>
                      <option type="item_category" id="item_category" name="item_category" value="3">Hoodies</option>
                      <option type="item_category" id="item_category" name="item_category" value="4">Accessoires</option>
                    </select>
                  @error('item_category')
                  <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>
        
                {{-- SUBCATEGORY --}}
                <div class="form-group">
                    <label for="example">Subcategory</label>
                    <input type="item_subcategory" id="item_subcategory" name="item_subcategory" class="form-control" required="">
                  @error('item_subcategory')
                  <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>

                {{-- BRAND --}}
                <div class="form-group">
                    <label for="example">Brand</label>
                    <br>
                    <select type="item_brand" id="item_brand" name="item_brand" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                      <option type="item_brand" value="1">Adidas</option>
                      <option type="item_brand" value="2">Nike</option>
                      <option type="item_brand" value="3">Balenciaga</option>
                      <option type="item_brand" value="4">Yeezy</option>
                    </select>
                  @error('item_brand')
                  <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>

                {{-- SIZE --}}
                <div class="form-group">
                    <label for="example">Size</label>
                    <input type="item_size" id="item_size" name="item_size" class="form-control" required="">
                  @error('item_size')
                  <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>

                {{-- COLOR --}}
                <div class="form-group">
                    <label for="example">Color</label>
                    <input type="item_color" id="item_color" name="item_color" class="form-control" required="">
                  @error('item_color')
                  <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>

                {{-- CONDITION --}}
                <div class="form-group">
                    <label for="example">Condition</label>
                    <br>
                    <select type="item_condition" id="item_condition" name="item_condition" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                      <option type="item_condition" value="1">1</option>
                      <option type="item_condition" value="2">2</option>
                      <option type="item_condition" value="3">3</option>
                      <option type="item_condition" value="4">4</option>
                      <option type="item_condition" value="5">5</option>
                      <option type="item_condition" value="6">6</option>
                      <option type="item_condition" value="7">7</option>
                      <option type="item_condition" value="8">8</option>
                      <option type="item_condition" value="9">9</option>
                      <option type="item_condition" value="10">10</option>
                    </select>
                  @error('item_condition')
                  <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>

                {{-- PRICE --}}
                <div class="form-group">
                    <label for="example">Price</label>
                    <input type="item_price" id="item_price" name="item_price" placeholder="€" class="form-control" required="">
                  @error('item_price')
                  <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>

                {{-- PHOTOS --}}
                <div class="form-group">
                    <label for="example">Photos</label>
                    <input type="item_photos" id="item_photos" name="item_photos" class="form-control" required="">
                  @error('item_photos')
                  <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>
        
                <button class="btn btn-primary" type="submit">Publish</button>
              </form>
          </div>
    </body>
    </html>
</x-login-layout>