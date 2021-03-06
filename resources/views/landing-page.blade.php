<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Ecommerce Demo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        <div id="app">
            <header class="with-background">
                <div class="top-nav container">
                    <div class="top-nav-left">
                        <div class="logo">Laravel Ecommerce Demo</div>

                        {{ menu('main', 'partials.menus.v-main') }}
                        {{-- the menu is referenced as main such that it is configurable in voyager as this reference 
                            see - http://127.0.0.1:8000/admin/menus/2/builder 
                            the template for this menu is defined in views/partials/menus/v-main
                            see https://voyager-docs.devdojo.com/core-concepts/menus-and-menu-builder 
                        --}}

                    </div>

                    <div class="top-nav-right">
                        @include('partials.menus.main-right')
                    </div>

                    {{--<ul>
                            <li><a href="{{ route('shop.index') }}">Shop</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="{{ route('cart.index') }}">Cart 
                                    @if( Cart::instance('default')->count() > 0 ) 
                                        <!--show cart item count badge if cart is unempty -->
                                        <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                                    @endif
                                </a>
                            </li>
                        </ul>--}}
                </div> <!-- end top-nav -->

                <div class="hero container">
                    <div class="hero-copy">
                        <h1>CSS Grid Example</h1>
                        <p>A practical example of using CSS Grid for a typical website layout.</p>
                        
                        {{-- menu('main') --}}
                        {{--output menu created in voyager see - http://127.0.0.1:8000/admin/menus/2/builder --}}
                        
                        <div class="hero-buttons">
                            <a href="#" class="button button-white">Button 1</a>
                            <a href="#" class="button button-white">Button 2</a>
                        </div>
                    </div> <!-- end hero-copy -->

                    <div class="hero-image">
                        <!-- <img src="img/macbook-pro-laravel.png" alt="hero image"> -->
                        <img src="{{ asset('/images/macbook-pro-laravel.png') }}" alt="hero image">
                    </div>
                </div> <!-- end hero -->
            </header>

            <div class="featured-section">
                <div class="container">
                    <h1 class="text-center">CSS Grid Example</h1>

                    <p class="section-description text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid earum fugiat debitis nam, illum vero, maiores odio exercitationem quaerat. Impedit iure fugit veritatis cumque quo provident doloremque est itaque.</p>

                    <div class="text-center button-container">
                        <a href="#" class="button">Featured</a>
                        <a href="#" class="button">On Sale</a>
                    </div>


                    <div class="products text-center">
                        @foreach ($products as $product)
                            <div class="product">
                                {{--<a href="{{ route('shop.show', $product->slug) }}"><img src="images/macbook-pro.png" alt="product"></a>--}}
                                {{-- <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ asset('storage/'.$product->image) }}" alt="product"></a> --}}
                                <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a>
                                <!--see helpers file for definition of productImage-->
                                <!--the slug and the image name of each product is the same-->
                                <!--<a href="#"><div class="product-name">{{--$product->name--}}</div></a>-->
                                <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                                <!--<div class="product-price">{{--$product->price--}}</div>-->
                                <div class="product-name">{{$product->presentPrice()}}</div>
                                <!--see product.php for definition of presetprice()-->
                            </div>
                        @endforeach
                    </div> <!-- end products -->

                    <div class="text-center button-container">
                        <a href="{{ route('shop.index') }}" class="button">View more products</a>
                    </div>

                </div> <!-- end container -->

            </div> <!-- end featured-section -->

            <div class="blog-section">
                <div class="container">
                    <h1 class="text-center">From Our Blog</h1>

                    <p class="section-description text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et sed accusantium maxime dolore cum provident itaque ea, a architecto alias quod reiciendis ex ullam id, soluta deleniti eaque neque perferendis.</p>

                    <div class="blog-posts">
                        <div class="blog-post" id="blog1">
                            <a href="#"><img src="images/blog1.png" alt="blog image"></a>
                            <a href="#"><h2 class="blog-title">Blog Post Title 1</h2></a>
                            <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ullam, ipsa quasi?</div>
                        </div>
                        <div class="blog-post" id="blog2">
                            <a href="#"><img src="img/blog2.png" alt="blog image"></a>
                            <a href="#"><h2 class="blog-title">Blog Post Title 2</h2></a>
                            <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ullam, ipsa quasi?</div>
                        </div>
                        <div class="blog-post" id="blog3">
                            <a href="#"><img src="img/blog3.png" alt="blog image"></a>
                            <a href="#"><h2 class="blog-title">Blog Post Title 3</h2></a>
                            <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ullam, ipsa quasi?</div>
                        </div>
                    </div> <!-- end blog-posts -->
                </div> <!-- end container -->
            </div> <!-- end blog-section -->

            <footer>
                <div class="footer-content container">
                <div>This e-commerce website was created for demonstration purposes only. Its UI was created by Andre Madarang for more information visit: 
                <a href="https://bit.ly/3e7vWQs" target="_blank">https://bit.ly/3e7vWQs</a> </div>
                    {{-- menu('footer', 'partials.menus.v-footer') --}}
                    {{-- the menu is referenced as footer such that it is configurable in voyager as this reference 
                        see - http://127.0.0.1:8000/admin/menus/3/builder 
                        the template for this menu is defined in views/partials/menus/v-main
                        see https://voyager-docs.devdojo.com/core-concepts/menus-and-menu-builder 
                    --}}
                </div>
                {{-- <div class="footer-content container">
                    <div class="made-with">Made with <i class="fa fa-heart"></i> by Andre Madarang</div>
                    <div>This UI was created by Andre Madarang</div>
                    <ul>
                        <li>Follow Me:</li>
                        <li><a href="#"><i class="fa fa-globe"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div> <!-- end footer-content --> --}}
            </footer>
        </div>
    </body>
</html>