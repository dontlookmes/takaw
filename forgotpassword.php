        <?php 
            require_once 'header.php';
        ?>
         
        <div class="forgotpassword-body-container">
            <div class="fogot-password-body">
                <header class = forgot-pass-header>パスワードを再設定</header>
                <div class="forgot-password-box">
                    <div class="a"></div>
                    <div class="fogot-password">
                   
                      
                        <div class="forgot-pass-item">
                                <label for="forgot-pass">メールまたを入力してください。</label><br>
                                <input id="forgot-pass" type='text'>
                                <div class="forgot-pass-error">error</div>
                                <div>
                                    <button class="fgsubmit" type="submit">送る</button>
                                </div>
                        </div>

                        <div class="forgot-pass-item2">
                                <div class="fguser-icon"><i class="fa-solid fa-user"></i></div>
                                <div class="forgot-pass-email">""</div>
                                <input autocomplete="off" maxlength="4" inputmode="numeric"  pattern="^0[0-9]*" id="fgverify-input" type='text' placeholder=" ">
                                <label for="fgverify-input">確認コード：</label>
                                <div class="forgot-pass-error fgverify-error">error</div>

                                <div>
                                    <!-- <div class="fgresend">再送</div> -->
                                    <button class="fgverify-btn">送る</button>
                                </div>
                        </div>

                        <div class="forgot-pass-item3">
                                <div class="fguser-icon"><i class="fa-solid fa-user"></i></div>
                                <div class="forgot-pass-email">""</div>
                                <label for="new-pass">新しいパスワード</label><br>
                                <input autocomplete="off" id="new-pass" type='password' >
                                <i class="new-pass-hidden-icon fa-regular fa-eye-slash"></i>
                            <i class="new-pass-show-icon fa-regular fa-eye"></i>
                                <div class="forgot-pass-error newpass-error">error</div>
                                <label for="new-pass-confirm">パスワード確認</label><br>
                                <input autocomplete="off" id="new-pass-confirm" type='password'>
                                <i class="new-pass-confirm-hidden-icon fa-regular fa-eye-slash"></i>
                            <i class="new-pass-confirm-show-icon fa-regular fa-eye"></i>
                               
                                <div>
                                    <button class="new-pass-submit">送る</button>
                                </div>
                        
                        </div>
                     </div>
                </div>
            </div>
        </div>

 <script src="data/js/forgotpass.js"></script>


        <?php 
            require_once 'footer.php';
        ?>
