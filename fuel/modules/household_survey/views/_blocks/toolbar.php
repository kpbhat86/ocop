<div id="action">
 <div id="actions" class="erpbuttonbar">
  <ul>
   <li class="end">
		<?php
			echo '<select id="ddlvendors" name="ddlvendors" style="min-width:175px;">';
			echo '<option value="plus">-- Select --</option>';
				foreach($vendorlists as $record) {
					if($record->supplier_id == $vid){
						echo '<option value="'.$record->supplier_id .'" selected>'.$record->name ."</option></br>";
					}
					else{
						echo '<option value="'.$record->supplier_id .'">'.$record->name ."</option></br>";	
					}
				}
			echo '</select>';		
		?>
   </li>  
  </ul>
 </div>
</div>
<div id="msgtext"></div>