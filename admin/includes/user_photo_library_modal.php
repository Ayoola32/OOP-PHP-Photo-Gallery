
<div class="modal fade" id="photo_library">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Gallery System Library</h4>
      </div>

      <div class="modal-body">
        <div class="col-md-9">
          <div class="thumbnails row">
        
            <!-- PHP LOOP HERE CODE HERE-->
            
            <div class="col-xs-2">
              <a role="checkbox" aria-checked="false" tabindex="0" id="" href="#" class="thumbnail">
                <img class="modal_thumbnails img-responsive" src="<!-- PHP LOOP HERE CODE HERE-->" data="<!-- PHP LOOP HERE CODE HERE-->">
              </a>
              <div class="photo-id hidden">
                
              </div>
            </div>

            <!-- PHP LOOP HERE CODE HERE-->
          </div>
        </div><!--col-md-9 -->

        <div class="col-md-3">
          <div id="modal_sidebar">

          </div>
        </div>
      </div><!--Modal Body-->

      <div class="modal-footer">
        <div class="row">
          <!--Closes Modal-->
          <button id="set_user_image" type="button" class="btn btn-primary" disabled="true" data-dismiss="modal">Apply Selection</button>
        </div>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
