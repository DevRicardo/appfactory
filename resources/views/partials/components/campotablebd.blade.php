    
      <div class="row row_field"  >

        <div class="input-field col s2">          
          <input id="name_{!! $pos !!}" name="row_{!! $pos !!}[]" type="text" class="validate">
          <label for="name">Name</label>
        </div>

        <div class="input-field col s2">
          <select name="row_{!! $pos !!}[]" id="type_{!! $pos !!}">
		      <option value="string">string</option>
		      <option value="integer">integer</option>		      
		  </select>
          <label for="type">Type</label>
        </div>

        <div class="input-field col s2">
          <input type="number" name="row_{!! $pos !!}[]" id="length_{!! $pos !!}" class="validate">
          <label for="length">Length</label>
        </div>

        <div class="input-field col s2">
          <select name="row_{!! $pos !!}[]" id="html_component_{!! $pos !!}">
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
          <label for="component">Component</label>
        </div>

        <div class="input-field col s1">
          <input id="attributes_{!! $pos !!}" name="row_{!! $pos !!}[]" type="hidden" class="validate">
          <a href="#" onclick="$('#modal1').openModal();" class="waves-effect waves-light" title="Attributes">
        <i  class="small material-icons">list</i>
        </a>
        </div>

        <div class="input-field col s1">
          <input name="row_{!! $pos !!}[]" id="validations_{!! $pos !!}" type="hidden" class="validate">
           <a href="#" onclick="$('#modal1').openModal();" class="waves-effect waves-light" title="Validations">
        <i  class="small material-icons">lock_outline</i>
        </a>
        </div>

      </div>
    
    <script type="text/javascript">
        $('select').material_select();
    </script>
