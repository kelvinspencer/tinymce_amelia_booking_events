<?php 


// Function to upgrade amelia decription editor
function add_wysiwyg_editor_to_amelia_events_desc_editor(){
    ?>
	<script src="/assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
		const editor_id = "amelia_event_desc_<?=time()?>";

		document.addEventListener("click", function(){
			initAmeliaEventDescTextArea();
		});

		function initAmeliaEventDescTextArea() {
			// console.log(tinymce.editors);
			// console.log(tinymce.activeEditor);
			const inputField = jQuery(document).find('.el-textarea__inner');
			const currentId = inputField.attr("id") || editor_id;
			inputField.attr("id", currentId);
			if(!inputField.hasClass("ameliaEventDesc")){
				inputField.addClass("ameliaEventDesc");
			}
			tinymce.remove('#'+currentId);
			tinymce.init({
				menubar:false,
    			statusbar: false,
				selector: '#'+currentId, setup: function (ed) {
					ed.on('change', function (e) {
						if(tinymce.activeEditor){
							updateAmeliaEventDescVueField(currentId);
						}
					});
				}
			});	
			
		}

		function updateAmeliaEventDescVueField(currentId){
			const newContent = tinymce.get(currentId).getContent({ format: 'html' });
			const textField = jQuery(document).find('.el-textarea__inner');
			textField.val(newContent)[0].dispatchEvent(new Event('input'))
		}

		function doesEventDescriptionFieldExists(){
			if(jQuery('#'+editor_id).position() == undefined){
				initAmeliaEventDescTextArea();
			}
			// check every two seconds
			setTimeout(doesEventDescriptionFieldExists, 2000);
		}

		// consistently check for class ameliaEventDesc
		doesEventDescriptionFieldExists();

    </script>
    <?php
}

// Only load for Events
if($_REQUEST['page'] == 'wpamelia-events'){
	add_action('admin_head', 'add_wysiwyg_editor_to_amelia_events_desc_editor');
}



?>
