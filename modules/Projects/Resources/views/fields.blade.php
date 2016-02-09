<div class="row">
        <div class="input-field col s6 name">
          <input placeholder="Placeholder" id="name" name="name" data-validate="required safePassword" type="text" class="">          
          <label for="name">Name project</label>
          <span class='helper-error'><ul></ul></span>

        </div>
        <div class="input-field col s6 image">

           <div class="file-field input-field" style="margin-top: 0px;">
             <div class="btn">
               <span>Image</span>
               <input type="file" id="image" name="image" data-validate="required imagenFile">
             </div>
             <div class="file-path-wrapper">
               <input class="file-path validate" type="text">
             </div>
           </div>       
          <span class='helper-error'><ul></ul></span>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12 description">
          <textarea id="description" name="description" data-validate="required text" class="materialize-textarea"></textarea>
          <label for="description">Description</label>
          <span class='helper-error'><ul></ul></span>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6 categorie_id">
          <select id="categorie_id" name="categorie_id" data-validate="required integer">
            <option value=" " disabled selected>Choose your categorie</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Categorie</label>
          <span class='helper-error'><ul></ul></span>
        </div>

        <div class="input-field col s6 state_id">
          <select class="icons" id="state_id" name="state_id" data-validate="required integer">
            <option value=" " disabled selected>Choose the state</option>
            <option value="5"><span  class=" amber-text  text-lighten-2">example 1</span></option>
            <option value="6">example 2</option>
            <option value="4">example 3</option>
          </select>
          <label>State</label>
          <span class='helper-error'><ul></ul></span>
        </div>

      </div>