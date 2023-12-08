<?php
        require_once 'productheader.php';
        ?>


        <!-- body----------------------------------------------- -->
        <?php

        $path = $_SERVER['PHP_SELF'];
        $parts = explode("/", $path);
        $fileName = end($parts);
        $fileName= pathinfo($fileName, PATHINFO_FILENAME);
        $conn = mysqli_connect('localhost', 'root', '', 'takayama');
        if (!$conn) {
            die("接続失敗：" . mysqli_connect_error());
        }
        $sql = "SELECT * FROM product WHERE product_id = '$fileName'";
        $result= $conn->query($sql);
        $product= mysqli_fetch_array($result,MYSQLI_ASSOC);
        $imgCode = json_decode($product['product_img']);
        ?>


        
        <div class="product-body-container">
            <div class="product-body">
                <div class="product-ac">
                    <div class="product-ac-info">
                        <div class="product-ac-info-box">
                            <div class="product-ac-img-ctr">
                                <div class="product-ac-img-ctr-btn left-btn"><i class="fa-solid fa-chevron-left"></i></div>
                                <div class="product-ac-img-ctr-btn right-btn"><i class="fa-solid fa-chevron-right"></i></div>
                            </div>
                            <div class="product-ac-img-box">
                                <img class="product-ac-img" src="" alt="">
                            </div>
                            <div class="product-ac-img-pannel">
                                <div class="img-pannel-img">
                                    <?php
                                    if(empty(!$imgCode)){
                                        foreach($imgCode as $imgCode){
                                        echo '<img src="../image/productimg/'.$imgCode.'.jpg" alt="">';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-ac-control">
                        <div class="product-ac-control-info">
                            <div class="product-name">
                                <?php echo $product['product_name']; ?>
                            </div>
                            <div class="product-price">
                            <?php echo $product['product_price']; ?>円
                            </div>
                            <div class="product-info">
                                色： <span><?php echo $product['product_color']; ?></span>
                            </div>
                            <div class="product-atribute product-info">
                                商品外寸 (高さ✕長さ✕幅): <span><?php echo $product['product_outsize']; ?></span>
                            </div>
                            <div class="product-atribute product-info">
                                商品内寸 (高さ✕長さ✕幅): <span><?php echo $product['product_insize']; ?></span>
                            </div>
                            <div class="product-atribute product-info">
                                製品重量： <span><?php echo $product['product_weight']; ?></span>
                            </div>
                            <div class="product-atribute product-info">
                                床面積： <span><?php echo $product['floor_space']; ?></span>
                            </div>
                        </div>
                        <div class="product-ac-control-btn">
                        <div class="add-notify">
                        <div class="circle-container">
                                <div class="circle"><i class="fa-solid fa-spinner"></i></div>
                                <div class="check-mark"><i class="fa-solid fa-check"></i></div>
                                </div>
                        </div>
                            <div value="<?php echo $product['product_id']; ?>" class="product-btn add-to-cart">かごに入れる</div>
                            <div class="product-btn">すぐ購入</div>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="ruijiseihin">
                    <header>類似製品</header>
                    <div class="ruijiseihin-items">
                        <div class="product">
                            <div class="product-item">
                                <a href="" class="product-link">
                                    <div class="product-item-img"></div>
                                    <h4 class="product-item-name">小型収納庫「CH-010-E」</h4>
                                    <div class="price">２６，８００円</div>
                                </a>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product-item">
                                <a href="" class="product-link">
                                    <div class="product-item-img"></div>
                                    <h4 class="product-item-name">小型収納庫「CH-010-E」</h4>
                                    <div class="price">２６，８００円</div>
                                </a>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product-item">
                                <a href="" class="product-link">
                                    <div class="product-item-img"></div>
                                    <h4 class="product-item-name">小型収納庫「CH-010-E」</h4>
                                    <div class="price">２６，８００円</div>
                                </a>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product-item">
                                <a href="" class="product-link">
                                    <div class="product-item-img"></div>
                                    <h4 class="product-item-name">小型収納庫「CH-010-E」</h4>
                                    <div class="price">２６，８００円</div>
                                </a>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product-item">
                                <a href="" class="product-link">
                                    <div class="product-item-img"></div>
                                    <h4 class="product-item-name">小型収納庫「CH-010-E」</h4>
                                    <div class="price">２６，８００円</div>
                                </a>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product-item">
                                <a href="" class="product-link">
                                    <div class="product-item-img"></div>
                                    <h4 class="product-item-name">小型収納庫「CH-010-E」</h4>
                                    <div class="price">２６，８００円</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        
        
        <?php
        require_once 'productfooter.php';
        ?>