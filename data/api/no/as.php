<?php
$str = '03432434234324234324';
if (ctype_digit($str)) {
    // Biến $loginInput là một số nguyên hợp lệ
    echo "Số nguyên hợp lệ!";
} else {
    // Biến $loginInput không phải là một số nguyên hợp lệ
    echo "Không phải là số nguyên hợp lệ!";
}