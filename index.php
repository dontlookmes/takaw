        <?php 
            require_once 'header.php';
        ?>
       
        <!-- body----------------------------------------------------------------------- -->
        <div class="index-body-container">
            <div class="index-body">
                <div class="grid">
                    <div class="column-2">
                        <div class="catelog-container">
                        <div class="catelog-header"><i class="fa-solid fa-bars"></i> 商品カタログ</div>
                        <ul class="catelog-list">
                            <li class="catelog-item catelog-item-active" value="all">全部</li>
                            <li class="catelog-item" value="small">小型収納庫</li>
                            <li class="catelog-item" value="medium">中型収納庫</li>
                            <li class="catelog-item" value="pattern">模様収納庫</li>
                            <li class="catelog-item" value="rice">米収納庫</li>
                        </ul>
                        </div>
                    </div>
                    <div class="column-10">
                        <div class="home-product">
                            <div class="filter">
                                <div class="filter-laber">
                                    <div class="reoder-box">
                                       <label for="reoder">並べ替え</label>
                                       <select name="reoder" id="reoder">
                                           <option value="0">標準</option>
                                           <option value="ASC">安い順</option>
                                           <option value="DESC">高い順</option>
                                       </select>
                                    </div>
                                    <div class="filter-page">
                                        <div class="filter-page-num">
                                         <div class="num"></div> <div class="k">/</div>    <div class="numtotal"></div> 
                                        </div>
                                        <div class="footer-switch-icon switch-left"><i class="fa-solid fa-chevron-left"></i></div>
                                        <div class="footer-switch-icon switch-right"><i class="fa-solid fa-chevron-right"></i></div>
                                    </div> 
                                </div>
                            </div>
                            <div class="product-container">
                            
                                   
                                    
        
                               
                            </div>
                        </div>
                        <div class="footer-page-control">
                            <div class="footer-switch-icon switch-left"><i class="fa-solid fa-chevron-left"></i></div>
                            <div class="footer-page-control-num">
                            <?php
                            // for($i=1;$i<=$pageNum;$i++){
                            //     echo '<div class="footer-page-num" value="'.($i-1).'" >'.$i.'</div>';
                            // }
                            ?>
                            </div>
                            <div class="footer-switch-icon switch-right"><i class="fa-solid fa-chevron-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="data/js/home.js"></script>
        
        <?php 
            require_once 'footer.php';
        ?>
