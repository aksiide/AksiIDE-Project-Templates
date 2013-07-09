{insert name='getstatusmsg'}
<h1>%project.name% (edit)</h1>

edit page for %project.name%

{form cssClass="akgrid-form z-form" enctype="multipart/form-data" action="%module.id%/edit"}
{formvalidationsummary}

	<fieldset>
		<div class="formrow">
		  <label for="name">Label Name<span class="z-form-mandatory-flag">{gt text='*'}</span></label>
		  <input id="name" name="name" type="text" value=""  >
		</div>
		<div class="formrow">
		  <label for="address">{gt text='Address'}</label>
		  <input id="address" name="address" type="text" value=""  >
		</div>
		<div class="formrow">
		  <label for="price">{gt text='Price'} (Rp.)</label>
		  <input id="price" name="price" type="text" value="0" class="field-numeric" >
		</div>
  </fieldset>
	<fieldset>
		<div class="formrow">
		  <label for="description">Keterangan :</label>
      <br><br>
		  <textarea id="description" name="description" rows=8></textarea>
		</div>
	</fieldset>

    <div class="buttonset">
        {formbutton class="z-bt-ok button ui-button-success" commandName="save" __text="Save"}
        {formbutton class="z-bt-cancel button" commandName="cancel" __text="Cancel"}
    </div>

{/form}

