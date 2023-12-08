<?php 
            require_once 'header.php';
        ?>

        <div class="user-body-container">
            <div class="user-body">
                <div class="user-body-box">
                    <div class="user-box">
                        <div class="user-box-header">
                            <div class="user-name">こんにちは、タカヤマ様</div>
                        </div>
                        <div class="user-box-element-container">
                            
                              <div class="user-box-element">
                                    <div class="user-box-element-header">アカウント</div>
                                    <div class="user-box-element-data">
                                        <div class="Personal-information">
                                        <div class="personal-info-edit-btn-box">
                                                <i class="edit-btn personal-info-edit-btn fa-solid fa-pen-to-square"></i>
                                                <i class="edit-btn cancel-btn fa-solid fa-xmark"></i>
                                            </div>
                                            <form class="personal-info-form" action="">
                                            <div class="personar-info-error">error</div>
                                            <div class="user-data-box user-name-box">
                                                                               
                                                    <div class="user-label">氏名：</div>
                                                    <div class="user-name-input-box">
                                                      <input  pattern="[\u30A1-\u30FA\u30FC\u30FD]*" class="user-name-input" id="lastnamerm" size="" type="text" value="" required title="カタカナで入力してください。" disabled> 
                                                        <input  pattern="[\u30A1-\u30FA\u30FC\u30FD]*" class="user-name-input" id="namerm" size="" type="text" value="" required title="カタカナで入力してください。" disabled><br>
                                                        <input required title="漢字または英語を入力してください。" pattern="^[\p{Script=Hiragana}\p{Script=Han}\p{Script=Latin}A-Za-z\s]+$" class="user-name-input" id="lastname" size="" type="text" value="" disabled>
                                                        <input required title="漢字または英語を入力してください。" pattern="^[\p{Script=Hiragana}\p{Script=Han}\p{Script=Latin}A-Za-z\s]+$" class="user-name-input" id="name" size="" type="text" value="" disabled>
                                                        
                                                    </div>
                                                   
                                            </div>
                                            <div class="user-data-box user-gender-box">
                                                    <div class="user-label">性別：</div>
                                                    <div class="user-gender-input-box gender-input">
                                                        <label for="male">男</label>
                                                        <input name="gender" class="user-gender-input" id="male" size="" type="radio" value="male" disabled>
                                                        <label for="female">女</label>
                                                        <input name="gender" class="user-gender-input" id="female" size="" type="radio" value="female" disabled>
                                                        <label for="other">他の</label>
                                                        <input name="gender" class="user-gender-input" id="other" size="" type="radio" value="other" disabled>
                                                    </div>
                                            </div>
                                            <div class="personar-info-error">error</div>
                                            <div class="user-data-box user-phonemunber-box">
                                                    <div class="user-label">電話番号：</div>
                                                    <div class="user-tel-input-box">
                                                        <input id="tel-head" pattern="^0[0-9]*" inputmode="numeric" required maxlength='3' class="user-tel-input" size="3" type="text" value="" disabled> <span>-</span>
                                                        <input id="tel-body" pattern="[0-9]*" inputmode="numeric" required maxlength='4' class="user-tel-input" size="4" type="text" value="" disabled> <span>-</span>
                                                        <input id="tel-foot" pattern="[0-9]*" inputmode="numeric" required maxlength='4' class="user-tel-input" size="4" type="text" value="" disabled>
                                                    </div>
                                            </div>
                                            <button class='personal-info-update-btn' >更新</button>
                                        </form>
                                        </div>

                                          <div class="login-infomation">
                                            <div class="login-info-moda">
                                                        <div class="mail-check-input login-moda-item">
                                                        <i class="new-mail-cancel-btn fa-solid fa-xmark"></i>
                                                            <input class='new-email-verify' type="text" maxlength="4" inputmode="numeric" pattern="^0[0-9]*" id="verification-code" placeholder=" ">
                                                            <label class='new-email-verify-label' for="verification-code">確認コード</label><br>
                                                            <div class="code-error">
                                                                 ＊コードが確認できません。
                                                            </div>
                                                           
                                                            <div class="resend new-email-code-resend">
                                                                <i class="fa-solid fa-rotate-right"></i>
                                                            </div>
                                                             <div class="email-update-btn">

                                                                <button>更新</button>
                                                            </div>
                                                        </div>
                                                        <div class="new-pass">
                                                        <i class="new-pass-cancel-btn fa-solid fa-xmark"></i>
                                                        <div class="personar-info-error new-pass-update-error">error</div>
                                                            <div class="password">
                                                                    <label for="password">新しいパスワード：</label>
                                                                        <input type="password" id="password" name="password" minlength="8" required>
                                                                        <i class="hidden-icon new-pass-hidden fa-regular fa-eye-slash"></i>
                                                                        <i class="show-icon new-pass-show fa-regular fa-eye"></i>
                                                            </div>
                                                            <div class="confirm-password">
                                                                    <label for="confirm_password">新しいパスワード確認：</label>
                                                                        <input type="password" id="confirm_password" name="confirm_password" minlength="8" required>
                                                                        <i class="hidden-icon new-passcf-hidden fa-regular fa-eye-slash"></i>
                                                                        <i class="show-icon new-passcf-show fa-regular fa-eye"></i>
                                                            </div>
                                                            <div class="pass-update-btn">

                                                                <button>更新</button>
                                                            </div>
                                                        </div>   
                                            </div>
                                            <div class="personar-info-error login-edit-error">error</div>
                                              <div class="user-data-box user-email-box">
                                                      <div class="user-email-input-box">
                                                      <label for="email" class="user-label">メールアドレス：</label>
                                                          <input id="email" class="user-email-input" size="20" type="text" value="" disabled> 
                                                          <div class='login-info-send-btn new-mail-send'><i class="fa-solid fa-paper-plane"></i></div>
                                                      </div>
                                                      <div><i class="email-edit-btn fa-solid fa-pen-to-square"></i><i class="edit-cancel edit-email-cancel fa-solid fa-xmark"></i></div>
                                                      
                                              </div> 
                                              
                                              <div class="personar-info-error pass-edit-error">error</div>
                                              <div class="user-data-box user-password-box">
                                             
                                                      <div class="user-password-input-box">
                                                          <label for="user-password" class="user-label">パスワード：</label>
                                                          <input id="user-password" class="user-password-input" size="18" type="password" value="●●●●●●●●●●●●●●●●●" disabled>
                                                          <i class="user-pass-hidden hidden-icon new-pass-hidden fa-regular fa-eye-slash"></i>
                                                          <i class="user-pass-show show-icon new-pass-show fa-regular fa-eye"></i>
                                                          <div class='login-info-send-btn password-send'><i class="fa-solid fa-paper-plane"></i></div>
                                                      </div>
                                                      <div><i class="password-edit-btn fa-solid fa-pen-to-square"></i><i class="edit-cancel edit-password-cancel fa-solid fa-xmark"></i></div>
                                                      
                                              </div>
                                          </div>
                                    </div>
                              </div>


                              <div class="user-box-element ">
                                    <div class="user-box-element-header">住所管理</div>
                                    <div class="user-box-element-data address-box">
                                     
                                    </div>
                                    <div class="address-list-control">
                                        <div>
                                            <button class='address-add-btn'>追加</button>
                                        </div>
                                        <div class='address-show-box'>
                                            <button class='address-view-more-btn'>さらに表示</button>
                                            <button class='address-minisize-btn'>縮小</button>
                                        </div>
                                        
                                    </div>
                                    <div class="user-box-element-data address-edit-box">
                                    <i class="address-add-cancel-btn fa-solid fa-xmark"></i>
                                    <div class="personar-info-error address-edit-error">error</div>
                                 
                                    <form class="address-form" action="">
                                          <div class="user-data-box user-zipcode-box">
                                          
                                            
                                                  <div class="user-label">郵便番号：</div>
                                                  <div class="user-address">
                                                      
                                                  <span>〒</span><input inputmode="numeric" maxlength="3" id="zipcode-head" class="user-address-input" size="3" type="text" pattern="[0-9]*" inputmode="numeric" name="zip-code-head" required>
                                                      <span>-</span>
                                                      <input inputmode="numeric" maxlength="4" id="zipcode-foot" class="user-address-input" size="4" type="text" pattern="[0-9]*" inputmode="numeric" name="zip-code-foot" required>
                                                  </div>
                                          </div>
                                          <div class="user-data-box user-ken-box">
                                                  <div class="user-label">都道府県：</div>
                                                  <div class="user-address">
                                                      <input  pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" id="ken" class="user-address-input" size="" type="text"  name="ken" value="" required>
                                                  </div>
                                          </div>
                                          <div class="user-data-box user-shi-box">
                                                  <div class="user-label">住所１（市区町村）：</div>
                                                  <div class="user-address">
                                                      <input  pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" id="shi" class="user-address-input" size="" type="text"  name="shi" value="" required>
                                                  </div>
                                          </div>
                                          <div class="user-data-box user-banchi-box">
                                                  <div class="user-label">住所２（番地）：</div>
                                                  <div class="user-address">
                                                      <input  pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" id="banchi" class="user-address-input" size="" type="text"  name="banchi" value="" required>
                                                  </div>
                                          </div>
                                          <div class="user-data-box user-tate-box">
                                                  <div class="user-label">住所３（建物名）：</div>
                                                  <div class="user-address">
                                                      <input  pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" id="tatemono" class="user-address-input" size="" type="text"  name="tatemono" value="" required>
                                                  </div>
                                          </div>
                                            <button type='submit' class="address-update-btn">更新</button>

                                       
                                    </div>
                                    </form>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <script src="data/js/user.js"></script>






<?php 
            require_once 'footer.php';
        ?>
