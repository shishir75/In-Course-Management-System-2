<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#exampleModalCenter">
  Add Course
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form method="post" class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col-12">
              <label>Course ID</label>
              <input type="number" name="course_id" class="form-control"  placeholder="Enter Course Code" required value="<?php echo $course_id; ?>">
              <div class="invalid-feedback">
                Please provide a valid Course Code.
              </div>
            </div>
            <div class="col-12 mt-2">
              <label>Course Name</label>
              <input type="text" name="course_name" class="form-control" placeholder="Enter Course Name" required value="<?php echo $course_name; ?>">
              <div class="invalid-feedback">
                Please provide a valid Course Name.
              </div>
            </div>


          </div>

         <button type="submit" name="add_course" class="btn btn-primary form-control mt-3">Add Course</button>
         <input type="reset" value="Reset" class="btn btn-warning form-control mt-2">
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