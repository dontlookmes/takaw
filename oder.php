<?php 
            require_once 'header.php';
        ?>

        <div class="order-body-container">
            <div class="oder-body">
                <div class="oder-box">
                    <div class="oderadd-info">
                        <header>ログイン不要の注文</header>
                        <div class="sign-box">
                            <form class="sign-form" action="emailcheck.php" method="post">
                                <div class="name-input">
                                    <div class="furigana-name ">

                                        <label for="furigana-sei">セイ:</label>
                                            <input type="text" id="furigana-sei" pattern="[\u30A1-\u30FA\u30FC\u30FD]*" name="furigana-sei" required title="カタカナで入力してください。">
                                        <label for="furigana-mei">メイ:</label>
                                            <input type="text" id="furigana-mei" pattern="[\u30A1-\u30FA\u30FC\u30FD]*" name="furigana-mei" required title="カタカナで入力してください。">
                                    </div>
                                    <div class="kanji-name ">
                                    <label for="kanji-sei">姓:</label>
                                        <input type="text" id="kanji-sei" pattern="^[\p{Script=Hiragana}\p{Script=Han}\p{Script=Latin}A-Za-z\s]+$" name="kanji-sei" required title="漢字または英語を入力してください。">
                                    <label for="kanji-mei">名:</label>
                                        <input type="text" id="kanji-mei" pattern="^[\p{Script=Hiragana}\p{Script=Han}\p{Script=Latin}A-Za-z\s]+$" name="kanji-mei" required title="漢字または英語を入力してください。">
                                    </div>
                                </div>

                            <div class="gender-box">
                                <div class="">
                                    <span>性別：</span>
                                    <label for="other">男</label>
                                        <input type="radio" id="other" value="male" name="gender" required>
                                </div>
                                    <div class="">
                                        <label for="male">女</label>    
                                            <input type="radio" id="male" value="female" name="gender" required>
                                    </div>
                                    <div class="">
                                        <label for="female">他の</label>   
                                            <input type="radio" id="female" value="other" name="gender" required>
                                    </div>
                            </div>
                            <div class="signin-mail-box">
                                <div class="email">
                                    <label for="signin-email">メールアドレス:</label>
                                        <input type="signin-email" inputmode="signin-email" id="signin-email" name="signin-email" required>
                                </div>

                            </div>
                            <div class="phone-number">
                                <div class="phone-number-input">
                                <span>電話番号:</span>
                                    <input type="text" maxlength="3" inputmode="numeric" pattern="^0[0-9]*" id="phone-head" name="phone-head" required>
                                    <span>-</span>
                                    <input type="text" maxlength="4" inputmode="numeric" pattern="[0-9]*" id="phone-body" name="phone-body" required>
                                    <span>-</span>
                                    <input type="text" maxlength="4" inputmode="numeric" pattern="[0-9]*" id="phone-foot" name="phone-foot" required>

                                </div>
                            </div>
                            <div class="address">
                                <div class="zip-code">
                                    <label for="zip-code-head">郵便番号：</label>
                                       <input type="text" maxlength="3"  pattern="[0-9]*"  inputmode="numeric" id="zip-code-head" name="zip-code-head" required>
                                       <span>-</span>
                                       <input type="text" maxlength="4"  pattern="[0-9]*" inputmode="numeric" id="zip-code-foot" name="zip-code-foot" required>
                                </div>
                                <label for="ken">都道府県：</label>
                                   <input type="text" id="ken" name="ken" pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" required>
                                </br>
                                <label for="shi">住所１（市区町村）：</label>
                                   <input type="text" id="shi" name="shi" pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" required>
                                </br>
                                <label for="banchi">住所２（番地）：</label>
                                   <input type="text" id="banchi" name="banchi" pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" required>
                                </br>
                                <label for="tatemono">住所３（建物名）：</label>
                                   <input type="text" id="tatemono" name="tatemono" pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" required>
                                </br>
                            </div>
                                <button type="submit">登録</button>
                            </form>
                        </div>
                    </div>

                    <div class="oder-form">
                        <div class="oder-form-box">
                        <header>お届け先住所</header>
                            <div class="customer-info">
                               
                                <div class="customer-personal-info">
                                    phan huy様<br>
                                </div>
                                <div class="customer-address">
                                    〒812-0041  <br>
                                    福岡市 博多区 博多駅東 1丁目 ４－１１　マクシーズリバーサイド５０２号
                                </div>
                                <div class="customer-info-control">
                                    <button>編集</button>
                                </div>
                            </div>
                        <header>注文商品</header>
                            <div class="oder-product-list">
                                --
                                <div class="cart-product oder-product">

                                    <div class="cart-product-item cart-product-CH-805go">
                                        <div class="cart-product-item-img" style="background-image: url(&quot;data/image/productimg/CH-805go.png&quot;); background-size: contain; background-repeat: no-repeat; background-position: 50% center;">
                                        </div>
                                                
                                        <div class="cart-product-info">
                                                    
                                            <h4 class="cart-product-item-name">小型収納庫 シャンパンゴールド CH-805</h4>
                                                    
                                            <div class="cart-price">11,800</div>
                                            <div class="cart-product-info">
                                                <span class="cart-product-label">色：</span><span class="cart-product-value">シャンパンゴールド</span>
                                            </div>
                                            <div class="cart-product-info">
                                                <span class="cart-product-label">商品外寸 (高さ✕長さ✕幅):</span><span class="cart-product-value">90✕80✕50Cm</span>
                                            </div>
                                            <div class="cart-product-info"><span class="cart-product-label">商品内寸 (高さ✕長さ✕幅):</span><span class="cart-product-value">85✕78✕37Cm</span>
                                            </div>
                                            <div class="cart-product-info">
                                                <span class="cart-product-label">床板耐荷重：</span><span class="cart-product-value">30kg</span>
                                            </div>
                                            <div class="cart-control">
                                                <label for="CH-805go">数量:</label><input id="CH-805go" class="suuryou cart-suuryou" name="suuryou" type="number" min="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-product oder-product">

                                    <div class="cart-product-item cart-product-CH-805go">
                                        <div class="cart-product-item-img" style="background-image: url(&quot;data/image/productimg/CH-805go.png&quot;); background-size: contain; background-repeat: no-repeat; background-position: 50% center;">
                                        </div>
                                                
                                        <div class="cart-product-info">
                                                    
                                            <h4 class="cart-product-item-name">小型収納庫 シャンパンゴールド CH-805</h4>
                                                    
                                            <div class="cart-price">11,800</div>
                                            <div class="cart-product-info">
                                                <span class="cart-product-label">色：</span><span class="cart-product-value">シャンパンゴールド</span>
                                            </div>
                                            <div class="cart-product-info">
                                                <span class="cart-product-label">商品外寸 (高さ✕長さ✕幅):</span><span class="cart-product-value">90✕80✕50Cm</span>
                                            </div>
                                            <div class="cart-product-info"><span class="cart-product-label">商品内寸 (高さ✕長さ✕幅):</span><span class="cart-product-value">85✕78✕37Cm</span>
                                            </div>
                                            <div class="cart-product-info">
                                                <span class="cart-product-label">床板耐荷重：</span><span class="cart-product-value">30kg</span>
                                            </div>
                                            <div class="cart-control">
                                                <label for="CH-805go">数量:</label><input id="CH-805go" class="suuryou cart-suuryou" name="suuryou" type="number" min="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-product oder-product">

                                    <div class="cart-product-item cart-product-CH-805go">
                                        <div class="cart-product-item-img" style="background-image: url(&quot;data/image/productimg/CH-805go.png&quot;); background-size: contain; background-repeat: no-repeat; background-position: 50% center;">
                                        </div>
                                                
                                        <div class="cart-product-info">
                                                    
                                            <h4 class="cart-product-item-name">小型収納庫 シャンパンゴールド CH-805</h4>
                                                    
                                            <div class="cart-price">11,800</div>
                                            <div class="cart-product-info">
                                                <span class="cart-product-label">色：</span><span class="cart-product-value">シャンパンゴールド</span>
                                            </div>
                                            <div class="cart-product-info">
                                                <span class="cart-product-label">商品外寸 (高さ✕長さ✕幅):</span><span class="cart-product-value">90✕80✕50Cm</span>
                                            </div>
                                            <div class="cart-product-info"><span class="cart-product-label">商品内寸 (高さ✕長さ✕幅):</span><span class="cart-product-value">85✕78✕37Cm</span>
                                            </div>
                                            <div class="cart-product-info">
                                                <span class="cart-product-label">床板耐荷重：</span><span class="cart-product-value">30kg</span>
                                            </div>
                                            <div class="cart-control">
                                                <label for="CH-805go">数量:</label><input id="CH-805go" class="suuryou cart-suuryou" name="suuryou" type="number" min="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
        --
                            </div>
                            <div class="total">
                                <div class="syoukei"><div>商品の小計(１個)：</div><div>70,000円</div></div>
                                <div class="ship-fee"><div>配送料・手数料：</div><div>２,000円</div></div>
                                <div class="zenbude"><div>合計：</div><div>２,000円</div></div>
                                <div class="seikyuu"><div>ご請求額：</div><div>80,000円</div></div>
                            
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


















           <?php 
            require_once 'footer.php';
        ?>