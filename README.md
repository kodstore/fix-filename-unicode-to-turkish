# fix-filename-unicode-to-turkish
Solves the unicode character problem on unzipped files name.

Wrong file name: ye#U015fil-filografi-teli.jpg
Adjusted output: yeşil-filografi-teli.jpg

Usage;
Firstly change "./image/" path on line 29;

After using ssh:

#php -f /path-to-file/fixfilename.php
