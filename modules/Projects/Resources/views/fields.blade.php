<div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="name" type="text" class="validate">
          <label for="name">Name project</label>
        </div>
        <div class="input-field col s6">

           <div class="file-field input-field" style="margin-top: 0px;">
             <div class="btn">
               <span>Image</span>
               <input type="file" id="image" name="image">
             </div>
             <div class="file-path-wrapper">
               <input class="file-path validate" type="text">
             </div>
           </div>       
          
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <textarea id="description" class="validate materialize-textarea"></textarea>
          <label for="description">Description</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6">
          <select>
            <option value="" disabled selected>Choose your categorie</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Categorie</label>
        </div>

        <div class="input-field col s6">
          <select class="icons">
            <option value="" disabled selected>Choose the state</option>
            <option value=""><span  class=" amber-text  text-lighten-2">example 1</span></option>
            <option value="">example 2</option>
            <option value="">example 3</option>
          </select>
          <label>State</label>
        </div>

      </div>