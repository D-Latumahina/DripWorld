<x-login-layout>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <div class="jumbotron">
            <center>
                <h1 class="display-4">For Sell</h1>
            <p class="lead">All items you have currently on sale</p>
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="/sell" role="button">Add Listing</a>
            </p>
            </center>
          </div>
        @foreach ($sells as $sell)
        <ul class="list-group list-group-horizontal-sm">
            <li class="list-group-item">
            <a href="/sell/for-sale/{{$sell->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
              <img data-toggle="tooltip" data-placement="bottom" style="width: 600px; height: 20%;" src="https://www.slick-sneakers.com/wp-content/uploads/2021/07/Nike-Air-Max-90-III-Concord-zijkant.jpg"/>
              <br>
              <small>{{$sell->created_at}}</small>
              <hr>
              <h5 class="mb-1">{{$sell->item_name}} | {{$sell->item_size}}</h5>
              <p class="mb-1">{{$sell->item_description}}</p>
              <small>€{{$sell->item_price}}</small>
            </a>
            </li>
            </ul>
          <br>
        @endforeach
    </body>
    </html>
</x-login-layout>