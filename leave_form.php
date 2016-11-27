<script>
	$(function() {
		var dates = $( "#date_start, #date_end" ).datepicker({
			altFormat: 'yy-mm-dd',
			defaultDate: new Date(),
			changeMonth: true,
			minDate: new Date(),
			//showOn: 'both',
			//altField: '#date1',
			//altField: '#date2',
			//showOn: 'button',
			//buttonText: 'Click to show the calendar',
			//buttonImageOnly: true, 
			//buttonImage: 'images/cal2.png',
			onSelect: function( selectedDate ) {
				var option = this.id == "date_start" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date);
			}
			
			
		});
		$( "#date_start" ).datepicker( "option", "altField", '#date1' );
		$( "#date_end" ).datepicker( "option", "altField", '#date2' );
	});
	</script>

    

<p class="bold_text">Please fill in the form below to apply for a leave:</p>
	
<form enctype="multipart/form-data" id="leave_form" name="leave_form" method="post" action="leave_process.php">
      <div class="bold_text">Leave Type:</div>
      <div  class="form_label_float_leave_apply" ><input type="radio" name="leave_type" id="leave_type" value="annual" checked="checked" />
      Annual Leave</div>
      <div class="form_label_float_leave_apply"><input type="radio" name="leave_type" id="leave_type2" value="medical" />
        Medical Leave</div>
    
      <div class="form_label_float_leave_apply" ><input type="radio" name="leave_type" id="leave_type3" value="maternity" />
      Maternity Leave</div>
      <div class="form_label_float_leave_apply"><input type="radio" name="leave_type" id="leave_type4" value="paternity" />
      Paternity Leave</div>
    
      <div class="form_label_float_leave_apply"><input type="radio" name="leave_type" id="leave_type7" value="emergency" />
Emergency Leave</div>
      <div class="form_label_float_leave_apply"><input type="radio" name="leave_type" id="leave_type6" value="unpaid" />
      Unpaid Leave</div>
    
      <div class="form_label_float_leave_apply"><input type="radio" name="leave_type" id="leave_type5" value="compassionate" />
Compassionate Leave</div>
  
    <div class="clearall"></div>
   
      <div class="bold_text">Leave Period:
      <div class="red_text">Selected dates will turn orange. Today's date is always highlighted and is selected by default.</div></div>
	 
<div class="fromto_leave_apply">From:</div>
<div class="cal_leave_apply" id="date_start"></div>

<input type="hidden" id="date1" name="date1"  />

<div class="fromto_leave_apply">To:</div>
<div class="cal_leave_apply" id="date_end"></div>
<input type="hidden" id="date2" name="date2"  />

<div class="clearall"></div>
    
<input type="hidden" name="application_status" value="pending" />
	
<div class="bold_text">Reason(s) for leave:
<div class="red_text">Maximum: 500 Letters</div></div>
<div >
<textarea class="text_area_feedback required" name="reason" id="reason" cols="30" rows="5" ></textarea>
</div>
	 
<div class="clearall"></div>
	
      <div class="bold_text">Upload supporting documents:
      <div class="red_text">Allowed file formats: .jpg, .jpeg, .png, .gif, .bmp, .doc, .docx, .txt, .pdf, .zip, .rar</div>
      <div class="red_text">Maximum file size is 2MB. If you wish to upload multiple files, compress them into a Zip or a RAR folder and upload it.</div>
      </div>
	  <div><input type="file" name="doc" id="doc">
	  </div>
	  
	
	
    <div style="margin-top:15px;">
        <input class="form_button_style" type="submit" name="Submit" id="Submit" value="Apply Now" />
      <input class="form_button_style" type="reset" name="Reset" id="Reset" value="Reset Form" /></div>
</form>	

<br />

<div class="clearall"></div>