

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Assign New Course to <?php echo $teacher_code; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form method="post" class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col-12">
              <label>Course Name</label>
            </div>

            <div class="col-12">
              <select class="custom-select" name="course_id" required>
                <option selected value="">--- Select Course ---</option>
                <?php
                  $courses = $getFromU->viewCourses();
                  foreach ($courses as $course) {
                    $course_id = $course->course_id;
                    $course_name = $course->course_name;
                ?>
                <option value="<?php echo $course_id ?? ''; ?>"><?php echo $course_name ?? ''; ?></option>
                <?php  } ?>
              </select>
              <div class="invalid-feedback">
                Please Choose a Course.
              </div>
            </div>


            <div class="col-12 mt-3">
              <label>Batch</label>
            </div>
            <div class="col-12">
              <select class="custom-select" name="batch" required>
                <option selected value="">--- Select Batch ---</option>
                <?php
                  $batches = $getFromU->viewBatches();
                  foreach ($batches as $batch) {
                    $batch = $batch->batch;
                ?>
                <option value="<?php echo $batch ?? ''; ?>"><?php echo $batch ?? ''; ?></option>
                <?php  } ?>
              </select>
              <div class="invalid-feedback">
                Please Choose a Batch.
              </div>
            </div>

            <div class="col-12 mt-2">
              <!-- <label>Teacher Code</label> -->
              <input type="hidden" name="teacher_code" class="form-control" placeholder="Enter Teacher Code" required value="<?php echo $teacher_code; ?>">
              <div class="invalid-feedback">
                Please provide a valid Teacher Code.
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-6">
              <button type="submit" name="assign_new_course" class="btn btn-primary form-control mt-3">Assign New Course</button>
            </div>
            <div class="col-sm-6">
              <button type="button" class="btn btn-secondary form-control mt-3" data-dismiss="modal">Close</button>
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