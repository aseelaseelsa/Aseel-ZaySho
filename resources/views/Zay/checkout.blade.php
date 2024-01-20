<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop eCommerce HTML CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--

TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Zay
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home.index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route("about")}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("shop")}}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("contact")}}">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    @auth
                    <a class="nav-icon position-relative text-decoration-none" href="{{route('cart.index')}}">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a>
                    @endauth
                    <a class="nav-icon position-relative text-decoration-none me-5" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                    @auth
                    <form action="{{route('order')}}" class="me-2">

                     <button class="btn btn-sm btn-success text-light  ">Orders</button>
                    </form>

                @endauth
                    @auth
                    <form action="{{route('logout')}}" method="POST" >
                     @csrf
                     <button class="btn btn-sm btn-dark text-light  ">Logout</button>
                    </form>

                @endauth

                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->


    <div class="container">
        <div class="row p-5">
  <form action="{{route('checkout.store')}}" method="post">
     @csrf
<div class="d-flex" >

    <div class="col-8 ">
    <h4 class="py-3">Shipping Ditails</h4>

        <div class="d-flex">
        <div class="mb-3 col-4">
            <label for="name" class="form-label">Name<span class="text-danger ps-1">*</span></label>
            <input type="text" class="form-control" name='name' required id="name" >
          </div>
          <div class="mb-3 col-4 ms-3">
            <label for="email" class="form-label">Eamil<span class="text-danger ps-1">*</span></label>
            <input type="email" class="form-control" name='email' required  id="email" >
          </div></div>
          <div class="d-flex">
          <div class="mb-3 col-4">
            <label for="phone" class="form-label">Phone<span class="text-danger ps-1">*</span></label>
            <input type="tel" class="form-control" required  name='phone' id="phone" >
          </div>
          <div class="mb-3 col-4 ms-3">
            <label for="address" class="form-label">Address<span class="text-danger ps-1">*</span></label>
            <input type="text" class="form-control" required  name='address' id="address" >
          </div>
          </div>

          <div class="d-flex">
          <div class="mb-3 col-4">
            <label for="city" class="form-label">City<span class="text-danger ps-1">*</span></label>
            <input type="text" class="form-control" required  name='city' id="city" >
          </div>
          <div class="mb-3 col-4 ms-3">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input type="text" class="form-control" name='postal_code' id="postal_code" >
          </div>
        </div>
          <div class="mb-3 col-4">
            <label for="postal_code" class="form-label">More Information</label>
<textarea class="form-control " name='more_info' rows='3' placeholder ="Order Notes"></textarea>

        </div>



    </div>

    <div class="col-3 bg-light ">
        <h5 class="py-3 text-center ps-2">Your Order</h5>
<div>
    <ul class="list-group bg-light list-group-flush">
        <li class="list-group-item  bg-light">
            <span>Product</span>
            <div class=" d-inline-flex px-3 col-9 justify-content-end" >Total</div>
        </li>
        @php
        $subTotal = 0;
     @endphp
@foreach ($items as $item )
@php
$total = $item['quantity']*$item['price'];
$subTotal += $total;
@endphp
        <li class="list-group-item bg-light ">
           <div class="d-inline-flex col-4  "> {{$item['title']}}</div>
            <div class=" d-inline-flex col-3 justify-content-center ">x{{$item['quantity']}}</div>
            <div class=" d-inline-flex col-4  justify-content-end" >${{$total}}</div>
        </li>
@endforeach

        <li class="list-group-item bg-light d-flex ">
            <div class="d-inline-flex col-6  ">SUBTOTAL</div>
            <div class=" d-inline-flex col-6 px-2 justify-content-end ">${{$subTotal}}</div>

        </li>
        <li class="list-group-item bg-light  d-flex ">
            <div class="d-inline-flex col-6 ">TOTAL</div>
            <div class=" d-inline-flex col-6 px-2 justify-content-end ">${{$subTotal}}</div>

        </li>
      </ul>

      <div class="payment">
        <div class="radio_btn ps-3 border-top pt-4 ">
            <input type="radio" checked name="payment_method" value="cash">
            <label >Cash Payments</label>
</div>
      </div>
      <div class="payment">
        <div class="radio_btn ps-3 pt-2 ">
            <input type="radio"  name="payment_method" value="paypal">
            <label >Paypal</label>
</div>
      </div>

      <div class="d-flex justify-content-center pt-4 pb-2">
        <button class="btn btn-sm btn-primary p-2" >Proceed To Pay</button>
      </div>

</div>
   </form>
    </div>
</div>


        </div>
    </div>


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            123 Consectetur at ligula 10660
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Luxury</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                        <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                        <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2021 Company Name
                            | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
