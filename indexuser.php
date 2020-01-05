<?php

//echo $_COOKIE['username'];

session_start();
 if(isset($_POST['submit']))
 {
        $vusername=$_POST['username'];
        $vpass=$_POST['pass'];
        $vlupas="SELECT * FROM reg_form WHERE username='$vusername' and password='$vpass'";
     
     echo $vlupas;
     
 }

 ?>
            





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online food</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="wrapper_full head_part">
        <div class="wrapper">
            <div class="title">
                <h1>FoodiZone</h1>
            </div>
            <div class="head_list">
                <ul>
                    <li><a href="" class="active">Home</a></li>
<!--                    <li><a href="http://localhost/prj/showdata.php">Food Menu</a>-->
<!--
                        <ul>
                            <li><a href="">Burger</a></li>
                            <li><a href="">Pizza</a></li>
                            <li><a href="">Chicken</a></li>
                            <li><a href="">Cold Drinks</a></li>
                        </ul>
-->
<!--                    </li>-->
                    <li><a href="">About Us</a></li>
                    <li><a href="http://localhost/prj/logout.php">LogOut</a></li>
<!--                  //  <li><a href="http://localhost/prj/reg_form.php">SignUp</a></li>-->
                    <li><a href="http://localhost/prj/addcart.php">Add Food</a></li>
                    <li><a href="http://localhost/prj/searchdata.php">Search Food</a></li>
                </ul>
            </div>
<!--
            <div class="search-option">

                <input type="text" placeholder="Search Foods" name="search">
                <button type="submit">Search food</button>

            </div>
-->
        </div>
        <div class="clr"></div>
    </div>
    <section class="slider_part">
        <i class="fa fa-arrow-left slidPrv"></i>
        <i class="fa fa-arrow-right slidNext"></i>
        <div class="background">
            <div class="slider">
                <img src="pic/br1.jpg">
            </div>
            <div class="slider">
                <img src="pic/piz1.jpg">
            </div>
            <div class="slider">
                <img src="pic/cik1.jpg">
            </div>
            <div class="slider">
                <img src="pic/br2.jpg">
            </div>
            <div class="slider">
                <img src="pic/piz2.jpg">
            </div>
            <div class="slider">
                <img src="pic/cik2.jpg">
            </div>
            <div class="slider">
                <img src="pic/br3.jpg">
            </div>
            <div class="slider">
                <img src="pic/piz3.jpg">
            </div>
            <div class="slider">
                <img src="pic/cik3.jpg">
            </div>
        </div>
        <div class="clr"></div>
    </section>


    <div class="wrapper_full about">
        <h1>About Uss</h1>
        <div class="wrapper">
            <div class="about_one">
                <p>Online food ordering is the process of ordering food through the website. A customer can choose to have the food delivered or for pick-up.The process consists of a customer choosing an item and finally choosing for pick-up or delivery.Payment is then administered by paying with a credit card or debit card through the app or website or in cash at the restaurant when going to pickup.The website inform the customer of the food quality, duration of food preparation, and when the food is ready for pick-up or the amount of time it will take for delivery.</p>
            </div>
            <div class="about_two">
                <h1>Our Food Item</h1>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/b1.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/p1.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/c1.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/b2.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/p2.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/c2.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/b3.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/p3.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/c3.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/b4.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/p4.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
                <div class="about_img">
                    <div class="about_img_two">
                        <img src="pic/c4.jpg" alt="b1.jpg">
                        <div class="overlay_img">
                            <h4>Burger Item:1</h4>
                            <p>Price:250</p>
                            <button type="submit">Order</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div class="footer">

        <h3>Contact Us</h3>
        <a href="https://www.facebook.com">Facebook</a><br />
        <a href="#">Shifatnaznin11@gmail.com</a><br />
        <a href="#">1689880506</a><br />


    </div>

    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>