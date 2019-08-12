<?php
require 'vendor/autoload.php';
use  GuzzleHttp\Client as GuzzClient;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/all.css">

   <!-- <link rel="stylesheet" href="css/fontiran.css">-->

    <link rel="stylesheet" href="css/boot.css">
    <link rel="stylesheet" href="css/style.css">



    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">


    <script src="js/jquery.js"></script>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>



</head>
<body>

<?php
$client = new GuzzClient();
try {
    $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

    echo $response->getStatusCode(); # 200
    echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
    echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

} catch (\GuzzleHttp\Exception\GuzzleException $e) {
}

?>

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">



            <div class="modal-header d-flex justify-content-between align-items-center">


                <button type="button" class="myclose  mr-sm-1" data-dismiss="modal">&times;</button>

                <h5> دسته بندی ها</h5>

            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container-fluid">


                    <div class="row text-right rtl" >

                        <?php


                        for ($i = 0 ; $i < 23 ; $i++) {
                            echo " 
                       <div class='col-sm-6 col-lg-6 col-md-6 col-6 mt-3'>
                       <a href='#'>
                      <img src='images/cats/2_021.png' width='45px' height='45px'>
                       </a>
                       <a href='#'>ورزشی</a>
                   </div>";
                        }

                        ?>
                        <div class='col-sm-6 col-lg-6 col-md-6 col-6 mt-3'>
                            <a href='#'>
                                <img src='images/cats/2_021.png' width='45px' height='45px'>
                            </a>
                            <a href='#'>تکنولوژی و اطلاعات</a>
                        </div>";


                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer d-flex">
                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
            </div>

        </div>
    </div>
</div> <!--modal_categories-->

<!--nav bar-->
<nav class="navbar sticky-top navbar-expand-md mr-0 navbar-light bg-light ">

    <a class=" align-items-center  d-flex" href="#"> کانال جدید <i class="fa fa-plus text-success   ml-1"></i> </a>

        <button class="navbar-toggler mr-2  navbar-toggler-right " type="button"
                data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <sapn class="navbar-toggler-icon"></sapn>
        </button>

     <div class="collapse navbar-collapse rtl"  id="navbarSupportedContent">

         <form class="d-flex  my-2 my-lg-0 ">
             <input class="form-control mr-sm-1 search_input small-font" type="search" placeholder="کانال مورد نظر را جستجو کنید..." aria-label="Search">
             <button class="btn btn-outline-success small-font my-sm-0 mr-1 "  type="submit">جستوجو</button>
         </form>

         <ul class="navbar-nav pr-1 mr-lg-2 mr-md-2 text-right my-2 my-lg-0 " >
             <li class="nav-item  active ">
                 <a class="nav-link" href="#"> <i class="fa fa-home ml-1"></i>صفحه اصلی  <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                     <img src="assets/telegram.png"  class="ml-1" width="25px" height="25px"> تلگرام <span class="sr-only">(current)</span>
                 </a>

                 <div class="dropdown-menu pt-0 pb-0">
                     <a class="dropdown-item nav-link  text-right "  href="#">
                         <img src="assets/telegram.png" class="mr-2" width="25px" height="25px">
                         تلگرام
                     </a>
                     <hr class="m-0 p-0">

                     <a class="dropdown-item nav-link   text-right " href="#" >
                         <img src="assets/telegram.png"  class="mr-2" width="25px" height="25px"> تلگرام <span class="sr-only">(current)</span>
                     </a>
                     <hr class="m-0 p-0">

                     <a class="dropdown-item  nav-link  text-right " href="#" >
                         <img src="assets/telegram.png"  class="mr-2" width="25px" height="25px"> تلگرام <span class="sr-only">(current)</span>
                     </a>
                     <hr class="m-0 p-0">
                 </div>

             </li>




             <li class="nav-item ">

                 <a class="nav-link " href="#" data-toggle="modal" data-target="#myModal">
                     <i class="fa fa-list ml-1"></i> دسته بندی ها </a>
             </li>

             <li class="nav-item ">
                 <a class="nav-link " href="#"> <i class="fa fa-user ml-1"></i> حساب کاربری</a>
             </li>
         </ul>
     </div>


</nav>
<!--end of nav bar-->



<!--slider -->
<div id="amazingslider-wrapper-1" class="mt-2 p-2" style=" display:block;position:relative;max-width:700px;max-height: 600px; margin:0px auto 44px;">
    <div  id="amazingslider-1"   style="display:block;position:relative;margin:0 auto;">

        <ul   class="amazingslider-slides" style="display:none;">
            <li ><img style="width: 90%" src="images/pic_3224.jpg"   data-description="سروش یک پیام رسان شکست خورده" />
            </li>
            <li  ><img  src="images/pic_4962.jpg"   data-description="ما اپاراتت را دوست داریم" />
            </li>
            <li ><img  src="images/pic_6185.jpg"     data-description="تلگرام امن ترین پیام رسان جهان" />
            </li>
            <li ><img  src="images/pic_9078.jpg"     data-description="بزرگترین شبکه اجتماعی ایران" />
            </li>
        </ul>
    </div>
</div>
<!--slider -->





<main class="grid-item container main mt-4 "  >

        <div class="d-flex list-top justify-content-between align-items-center rtl" >
            <p class="mr-3"> پر بازدید ترین ها</p>

            <a class="ml-3 d-flex align-items-center" href="#"> همه <i class="fa mr-1 fa-angle-left" >  </i>   </a>

        </div>

        <div class=" mt-2 text-right owl-carousel myowl " id="owl-example" >
           <?php

           for ($i= 0 ; $i<12 ; $i++) {
                echo ' <div class="item ">
                <a href="#">
               <img   src="images/pic_3224-tn.jpg" class="item-img">
               </a>
               
               <a href="#" class="item-title" >  پوشکا مرجع شبکه های اجتماعی</a>
               <p class="text-center mt-2 item-member">32k</p>
               <p class="text-center mt-1 text-success item-prefix">عضو</p>
</div>';
            }
           ?>

        </div>
        <hr >
    </main>


<main class="grid-item container main mt-4 "  >

    <div class="d-flex  justify-content-between align-items-center  rtl" >
        <p class="mr-3"> پر بازدید ترین ها</p>

        <p class="ml-3"> همه </p>

    </div>

    <div class=" mt-2  text-right owl-theme owl-carousel myowl" id="owl-example2" >
        <?php

        for ($i= 0 ; $i<12 ; $i++) {
            echo ' <div class="item">
               <img  src="images/pic_3224-tn.jpg" class="item-img">
               <p class=" item-title">سبشسب پوشکا مرجع شبکه های اجتماعی</p>
               <p class="text-center   item-member">32k</p>
               <p class="text-center text-success item-prefix">عضو</p>
</div>';
        }
        ?>

    </div>
    <hr >
</main>


<main class="grid-item container main mt-4"  >

    <div class="d-flex  justify-content-between align-items-center rtl" >
        <p class="mr-3"> پر بازدید ترین ها</p>

        <p class="ml-3"> همه </p>

    </div>

    <div class=" mt-2 text-right owl-theme owl-carousel myowl" id="owl-example2" >
        <?php

        for ($i= 0 ; $i<12 ; $i++) {
            echo ' <div class="item">
               <img  src="images/pic_3224-tn.jpg" class="item-img">
               <p class=" item-title"> پوشکا مرجع شبکه های اجتماعی</p>
               <p class="text-center   item-member">32k</p>
               <p class="text-center text-success item-prefix">عضو</p>
</div>';
        }
        ?>

    </div>
    <hr >
</main>


<!--footer strat-->
    <div  class="container-fluid footer" >

<div class="container footer-container">
    <div class="row  text-center rtl " >
        <div class="col-lg-3  col-md-6 col-sm-6" >
            <img style="cursor:pointer" onclick="window.open('https://api.nextpay.org/trust/14159',
      'Popup','location=no,toolbar=no, statusbar=no, scrollbars=yes,menubar=no, resizable=0,width=700,height=800,top=30')"
                 alt="nextpay_trust_logo" height="150" width="150" src="https://nextpay.ir/trust_seal.png">
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 info-footer" >
            <h4>اطلاعات </h4>
           <hr class="bg-success mt-0 mb-0" style="border-width: 2px  ; border-color: #1E0000">

            <ul class="pr-0 mt-2">
                <li class="text-right mt-1"> <a > درباره پوشکا</a></li>
                <li class="text-right mt-1"> <a > قوانین ثبت کانال و صفحه</a></li>
                <li class="text-right mt-1"> <a >ارتباط با بخش پشنیبانی</a></li>
                <li class="text-right mt-1"> <a >پرسش های متداول</a></li>
            </ul>

        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 info-footer" >
            <h4>دسترسی سریع</h4>
            <hr class="bg-success mt-0 mb-0" style="border-width: 2px  ; border-color: #1E0000">

            <ul class="pr-0 mt-2">
                <li class="text-right mt-1"> <a > ثبت صفحه یا کانال </a></li>
                <li class="text-right mt-1"> <a >حساب کاربری</a></li>
                <li class="text-right mt-1"> <a >درخواست پشتیبانی</a></li>
                <li class="text-right mt-1"> <a >گزارش تخلف</a></li>
            </ul>

        </div>



        <div class="col-lg-3 col-md-6  d-flex flex-column align-self-center justify-content-center" >
            <button class="btn btn-success py-2 my-2" type="button" > <i class="fa fa-android"></i> دانلود مستقیم اپلیکیشن اندروید</button>
            <button class="btn btn-success py-2" type="button" > <i class="fa fa-android"></i> دانلود مستقیم اپلیکیشن اندروید</button>

        </div>

    </div>

</div>
</div>

   <div>
       <!--footer_end-->








</body>

<script src="js/owl.carousel.min.js"></script>
<script src="js/bootstrap.js"></script>
<script  src="js/script.js"></script>

<script>
/*    $(document).ready(function () {
        for (var  i=0 ; i<100 ; i++) {
            setTimeout(function () {
                $("#mybar").css("width",i+"%");
            },1000)

        }
        $("#mtbtn").click(function () {
            alert("salam");
            //  $("#mybar").css("width","30%");
        });

        $(".list-group-item").click(function () {
            $(this).parent().find("li.active").removeClass("active")
            $(this).attr("class","list-group-item active")
            //  $(this).addc("class","list-group-item active")  //they both do some thing
        })

    })*/

    $(document).ready(function () {
        $(".myowl").owlCarousel({

            loop:false,
            rtl:true,
            margin:0,
            nav:false,
            dots:false,
            autoPlay: 1000,
            responsive:{
                0:{
                    items:4
                },
                600:{
                    items:6
                },

                750:{
                    items:6
                },
                1000:{
                    items:8
                }
            }
        });


    });

</script>
</html>