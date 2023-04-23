<!DOCTYPE html>
<html>

<head>
    <title>{{$pageTitle ?? env('APP_NAME')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @yield('meta-data')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('front/images/fav-icon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('front/images/fav-icon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('front/images/fav-icon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('front/images/fav-icon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('front/images/fav-icon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('front/images/fav-icon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('front/images/fav-icon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('front/images/fav-icon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front/images/fav-icon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('front/images/fav-icon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front/images/fav-icon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('front/images/fav-icon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/images/fav-icon/favicon-16x16.png')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/lightgallery/latest/css/lightgallery.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/cstm-style.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!-- Start of megatan Zendesk Widget script -->
    <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key={{env('ZE_SNIPPET_KEY')}}"> </script>
    <!-- End of megatan Zendesk Widget script -->
</head>

<body>
    <div class="module-body" style="display: none;">
        <div class="hn-body">
            <i class="fas fa-truck-moving"></i>
            <div class="hn-content">
                Place an order before midnight on Sunday 23rd May for your chance to win £250 for first, £125 for second and £50 for third place.&nbsp; Good luck!!!!!
            </div>
        </div>
        <div class="header-notice-close-button">
            <a class="btn hn-close" href="javascript:void(0);"><i class="fas fa-times"></i> </a>
        </div>
    </div>
    <!-- [ Header ] start -->
    @include('front.includes.header')
    <!-- [ Header ] end -->
    @yield('content')
    <!-- [ Footer ] start -->
    @include('front.includes.footer')
    <!-- [ Footer ] end -->
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade modal-center quickview_modal" id="productQuickViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <!-- Modal end-->

    <!--Model-Ask-Question-->
    <div class="modal Question-modal" id="Question-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <!-- <h1 class="modal-title">Modal Heading</h1> -->
                    <h3 class="title module-title">Ask a Question About This Product</h3>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="">
                        @csrf
                        <fieldset>
                            <div class="form-group custom-field required">
                                <label class="col-sm-2 control-label">Your Name</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Your Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group custom-field required">
                                <label class="col-sm-2 control-label" for="field-6114cb3b071e5-2">Your Email</label>
                                <div class="col-sm-10">
                                    <input type="email" placeholder="Your Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group custom-field required">
                                <label class="col-sm-2 control-label">Topic</label>
                                <div class="col-sm-10">
                                    <select name="item[3]" id="field-6114cb3b071e5-3" class="form-control">
                                        <option> --- Please Select --- </option>
                                        <option>How does it fit?</option>
                                        <option>How do you wash it?</option>
                                        <option>Customize this form with any fields...</option>
                                        <option>Product name is included in the email</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group custom-field ">
                                <label class="col-sm-2 control-label">Message</label>
                                <div class="col-sm-10">
                                    <textarea name="item[4]" rows="5" placeholder="Message" id="field-6114cb3b071e5-4" class="form-control"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary" data-loading-text="<span>Submit</span>"><span>Submit</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Model-Ask-Question-End-->

    <script type="text/javascript">
    let globalUrls = {

        compare: {

            add: "{{route('compare.add')}}"
        },

        wishlist: {

            add: "{{route('wishlist.add')}}"
        }
    };
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript" src="{{ asset('front/js/validation.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/g/lightgallery@1.3.5,lg-fullscreen@1.0.1,lg-hash@1.0.1,lg-pager@1.0.1,lg-share@1.0.1,lg-thumbnail@1.0.1,lg-video@1.0.1,lg-autoplay@1.0.1,lg-zoom@1.0.3"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('custom_routes')
    @yield('js')
    <script type="text/javascript" src="{{ asset('front/js/custom-js.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $('.cs-carousel-nw').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        items: 1,
    });

    $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
        $(e.target)
            .prev()
            .find("i:last-child")
            .toggleClass("fa-minus fa-plus");
    });

    $(document).ready(function() {
        $('body').find('.js-example-basic-single').select2();
    });
    </script>
</body>

</html>