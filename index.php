<?php
error_reporting(E_ALL);
require 'vendor/autoload.php';
include 'helper/config.php';

use  GuzzleHttp\Client as GuzzClient;
$client = new GuzzClient(['base_uri' => 'http://poushka.com/v1/']);
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
  $response = $client->request('GET', 'getSocialA');
  $socials= json_decode($response->getBody(),true);
  if (!isset($_COOKIE["social_id"])) {
      setcookie(SOCIAL_ID_SOCIAL, $socials[0][SOCIAL_ID_SOCIAL],2147483647);
      setcookie(P_NAME_SOCIAL, $socials[0][P_NAME_SOCIAL],2147483647);
      setcookie(URI_SOCIAL, $socials[0][URI_SOCIAL],2147483647);
      setcookie(ICON_SOCIAL, $socials[0][ICON_SOCIAL],2147483647);
      setcookie(PREFIX_SOCIAL, $socials[0][PREFIX_SOCIAL],2147483647);
      setcookie(MEMBER_PREFIX_SOCIAL, $socials[0][MEMBER_PREFIX_SOCIAL],2147483647);
  }

  $body = 1;
 $sections_request  = $client->request('GET', "PSections/".$_COOKIE[SOCIAL_ID_SOCIAL],[
          'query' => ["main" =>1 ,'cat_id'=>0 , 'prefix' =>$_COOKIE[PREFIX_SOCIAL]
              ]
  ],$body);
  $sections= json_decode($sections_request->getBody(),true);




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
                        $response = $client->request('GET', 'categories');

                        $categories = json_decode($response->getBody(),true);
                        foreach ($categories as $single) {
                            $catname = $single["name"];
                            $cat_id = $single["cat_id"];
                            $icon = $single["icon"];
                            $img_address = IMG_URL.'cat/'.$icon;
                            echo " 
                       <div class='col-sm-6 col-lg-6 col-md-6 col-6 mt-3 d-flex align-items-center category '>
                        <div>
                          <a href='poushka.com/categories/$cat_id'>
                        <img src='$img_address' width='45px' height='45px'>
                          </a>
                        </div>
                        <div class='mr-1'>
                      <a  href='poushka.com/categories/$cat_id'> $catname</a>
                         </div>
                       
                   </div>";
                        }
                        ?>





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

    <a class=" align-items-center ml-md-2 ml-1 ml-lg-3 d-flex "  href="#"> <?php echo "ثبت " . $_COOKIE[PREFIX_SOCIAL]  ?><i class="fa fa-plus text-success   ml-1"></i> </a>

        <button class="navbar-toggler  mr-2  navbar-toggler-right " type="button"
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

                     <img src=<?php echo IMG_URL.'social_cat/'.$_COOKIE[ICON_SOCIAL] ?>  class="ml-1" width="25px" height="25px"> <?php echo $_COOKIE[P_NAME_SOCIAL]?> <span class="sr-only">(current)</span>
                 </a>

                 <div class="dropdown-menu pt-0 pb-0">

                     <?php
                     foreach ($socials as $single_social) {
                         if ($single_social[SOCIAL_ID_SOCIAL] != $_COOKIE[SOCIAL_ID_SOCIAL]) {
                             $icon = IMG_URL.'social_cat/'.$single_social[ICON_SOCIAL];
                             $pname = $single_social[P_NAME_SOCIAL];

                             echo  "
                             <a class=\"dropdown-item nav-link  text-right \"  href=\"#\">
                             <img src=\"$icon\" class=\"mr-2\" width=\"25px\" height=\"25px\">
                                 $pname
                                </a> 
                                <hr class=\"m-0 p-0\">
                             ";
                         }

                     }


                     ?>



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

<div class="container p-0" >


<div id="owl-demo" class="owl-carousel owl-theme mt-3  p-0">


        <?php
        $banners = $sections[0]["pages"];
        foreach ($banners as $banner) {
            $banner_pic = IMG_URL."banner/".$banner["banner"];
            $banner_name = $banner["name"];

            $short_des = $banner["short_des"];

            $banner_alt = $_COOKIE[PREFIX_SOCIAL] . " " . $_COOKIE[P_NAME_SOCIAL]. " " . $banner_name;

            echo "
               <div class=\"item_banner pr-1 pl-1\">
               <a href=\"#\">
               <img src=\"$banner_pic\"  alt=\"$banner_alt\">
               <span class='text-center d-block mt-3 '> $short_des </span>
               
           </a> 
           </div>
            ";
        }

        ?>





</div>

</div>

<!--slider -->
<!--<div id="amazingslider-wrapper-1" class="mt-2 p-2" style=" display:block;position:relative;max-width:700px;max-height: 600px; margin:0px auto 44px;">
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
</div>-->
<!--slider -->





<main class="grid-item container main mt-4 "  >

        <div class="d-flex list-top justify-content-between align-items-center rtl" >
            <p class="mr-3"> پر بازدید ترین ها</p>

            <a class="ml-3 d-flex align-items-center" href="#"> همه <i class="fa mr-1 fa-angle-left" >  </i>   </a>

        </div>

        <div class=" mt-2 text-right owl-carousel myowl" id="owl-example" >
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


        $("#owl-demo").owlCarousel({

            navigation : true, // Show next and prev buttons
            slideSpeed : 300,
            paginationSpeed : 400,
            rtl:true,
            singleItem:true,
            items:1,
            autoplay : 4000 ,
            autoPlay: 4000,
            loop:true,





            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });


    });

</script>
</html>