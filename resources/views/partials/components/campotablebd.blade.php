<div class="row">
    <form class="col s12">
      <div class="row">

        <div class="input-field col s6">          
          <input id="name" type="text" class="validate">
          <label for="name">Name</label>
        </div>

        <div class="input-field col s6">
          <select name="type" id="type">
		      <option value="string">string</option>
		      <option value="integer">integer</option>		      
		  </select>
          <label for="type">Type</label>
        </div>

        <div class="input-field col s6">
          <input id="icon_telephone" type="tel" class="validate">
          <label for="length">Length</label>
        </div>

        <div class="input-field col s6">
          <select name="componet" id="componet">
		      <option value="input:text">input:text</option>
		      <option value="input:email">input:email</option>
		      <option value="input:number">input:number</option>	
		      <option value="input:date">input:date</option>	
		      <option value="input:url">input:url</option>	
		      <option value="textarea">textarea</option>	
		      <option value="select">select</option>	
		      <option value="radio">radio</option>
		      <option value="chackbox">chackbox</option>			      
		  </select>
          <label for="componet">Component</label>
        </div>

        <div class="input-field col s6">
          <input id="attributes" name="attributes" type="text" class="validate">
          <label for="attributes">Attributes</label>
        </div>

        <div class="input-field col s6">
          <input id="validations" id="validations" type="tel" class="validate">
          <label for="validations">Validations</label>
        </div>

      </div>
    </form>
    <script type="text/javascript">
        $('select').material_select();
    </script>
</div>