<script>
    $(document).ready(function() {
       
        $('.select_grade_level').on('change', function() {
            let glvl = $('.select_grade_level :selected').val();

            $.ajax({
                method: 'POST',
                url: '/teacher/sf-10/find-section',
                data: {
                    'glvl': glvl,
                },
                success: function(data) {
                    let opt = `<option selected disabled>Select Section</option>`;
                    $.each(data.sections, function(key, val) {
                        opt += `
                                <option value="${key}">${val}</option>
                                `;
                    });
                    $('.select_section').html(opt);
                }
            });
        });
        $('.select_section').on('change', function() {
            let section = $('.select_section :selected').val();
            let glvl = $('.select_grade_level :selected').val();

            $.ajax({
                method: 'POST',
                url: '/teacher/sf-10/find-students',
                data: {
                    'section': section,
                    'glvl': glvl,
                },
                success: function(data) {

                    let td = `

                    `;
                    $.each(data.students, function(key, val) {
                       td += `
                       <tr>
                       <td>${val.name}</td>
                       <td>${val.name}</td>
                       <td>${val.name}</td>
                       <td>${val.name}</td>
                       <td>
                      <div class="dropdown">
                          <button class="btn btn-warning rounded-0 fw-bold"
                              data-bs-toggle="dropdown" type="button" aria-expanded="false">
                              Export
                          </button>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Excel</a></li>
                              <li><a class="dropdown-item" href="#">PDF</a></li>

                          </ul>
                      </div>
                       </td>
                      </tr>
                       `;
                    });


                    $('.studentLists').html(`
                    <hr>
                    <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>Complete Name</th>
                              <th>LRN</th>
                              <th>Grade Level</th>
                              <th>Action</th>
                              <th>Export</th>
                          </tr>
                      </thead>
                      <tbody>
                        
                          ${td}
                      
                      </tbody>
                      

                    </table>
                  `);
                    
                }
            });
        });
    });
</script>
