<!-- Modal -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Multiple Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="form-row">

            <div class="col-12 mt-2">
              <div class="form-group">
                <label for="exampleFormControlFile1">Choose a CSV File</label>
                <input type="file" name="csv_file" class="form-control-file" id="exampleFormControlFile1">
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-sm-6">
              <button type="submit" name="add_multiple_students" class="btn btn-primary form-control mt-3">Add CSV File</button>
            </div>
            <div class="col-sm-6">
              <input type="reset" value="Reset" class="btn btn-warning form-control mt-3">
            </div>
          </div>



        </form>

        <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        </script>



      </div>

    </div>
  </div>
</div>