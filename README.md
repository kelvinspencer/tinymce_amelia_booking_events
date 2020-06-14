# Amelia Booking Plugin - Events Page with Tinymce
This script adds the tinymce editor to the amelia booking plugin on the admin events page without the need to edit the plugin content. 

Copy the contents of function-tinymce.php in to the bottom of your wordpress theme functions.php 
Make sure you have tinymce at this specified location (/assets/tinymce/tinymce.min.js) on your webserver or update the path to tinymce.

*Amelia Plugin:*
https://wpamelia.com/

The issue I came across was the need to have the ability to add styling to the events description but I only had the basic textare field. This script replaces that input element with the tinymce editor.

Must have the tinymce plugin paid or community edition.
`<script src="/assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>`

Future improvements:
Currently since the page is rendering with vue, I was unable to detect the elements on the page on page load. So I have a setimeout that checks periodically to see if its visible on the screen. This can be improved, I'm just not sure how just yet.

