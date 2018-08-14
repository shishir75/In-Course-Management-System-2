<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Single Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form method="post" class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col-12">
              <label>Roll Number</label>
              <input type="number" name="roll" class="form-control"  placeholder="Enter Student Roll Number" required value="<?php echo $roll; ?>">
              <div class="invalid-feedback">
                Please provide a valid Roll Number.
              </div>
            </div>
            <div class="col-12 mt-2">
              <label>Student Name</label>
              <input type="text" name="student_name" class="form-control" placeholder="Enter Course Name" required value="<?php echo $student_name ?? ''; ?>">
              <div class="invalid-feedback">
                Please provide a valid Student Name.
              </div>
            </div>

            <div class="col-12 mt-2">
              <label>Batch Number</label>
              <input type="number" name="batch" class="form-control" placeholder="Enter Batch Number" required value="<?php echo $batch; ?>">
              <div class="invalid-feedback">
                Please provide a valid Batch Number.
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-6">
              <button type="submit" name="add_single_student" class="btn btn-primary form-control mt-3">Add Student</button>
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