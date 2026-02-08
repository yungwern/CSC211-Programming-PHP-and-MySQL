<?php

// 1. substr() - Extract part of a string.
// Purpose: To get a portion of a string.
$full_name = "Eli Werner";
echo substr($full_name, 0, 3) . "<br>"; // outputs Eli (first 3 will provide my first name only)

// 2. str_word_count() - Count the number of words in a string.
// Purpose: To find out how many words are in a string. 
echo str_word_count($full_name) . "<br>"; // outputs: 2 (Eli and Werner)

// 3. str_replace() - Replace string in a text.
// Purpose: To replace a specific word or part of a string.
echo str_replace("Werner", "is awesome!", $full_name) . "<br>"; // outputs: Eli is awesome!
?>