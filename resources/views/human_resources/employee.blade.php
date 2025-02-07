@extends('layouts.app')
<link rel="stylesheet" href="/css/humanresources/style.employee.css">
@section('content')
    @include('layouts.modals')
    @include('layouts/modal.HumanResourcesModal')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Human Resources</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Employees</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-building-house'></i>
                <span class="text">
                    <h3>{{ $departCount }}</h3>
                    <p>Total Department</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-briefcase'></i>
                <span class="text">
                    <h3>{{ $jobCount }}</h3>
                    <p>Total Jobs</p>
                </span>
            </li>
            <li>
                <i class='bx bx-user'></i>
                <span class="text">
                    <h3>{{ $empCount }}</h3>
                    <p>Total Employees</p>
                </span>
            </li>
        </ul>
        {{-- Employee Details --}}
        @if (Session::has('msg'))
            <script>
                $(document).ready(function() {
                    $("#popModalSuccess").modal('show');
                });
            </script>
            <p class="alert alert-info">{{ Session::get('msg') }}</p>
        @endif
        @if (Session::has('msgDel'))
            <script>
                $(document).ready(function() {
                    $("#deletePopupModal").modal('show');
                });
            </script>
            <p class="alert alert-danger">{{ Session::get('msgDel') }}</p>
        @endif
        {{-- session --}}
        <div class="table-data">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar">
                        <li>
                            <a href="#" class="tab active" data-id="home">
                                <span class="text">Employee List</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tab" data-id="profile">
                                <span class="text">Job List</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tab" data-id="messages">
                                <span class="text">Department List</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tab" data-id="settings">
                                <span class="text">Schedule List</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="order">
                                <div class="head">
                                    <button type="button" class="addnewEmpButton">
                                        <a href="/registration">
                                            <span>
                                                <i class='bx bxs-plus-circle'></i>
                                                Add new employee
                                            </span>
                                        </a>
                                    </button>
                                    <i class='bx bx-search'></i>
                                    <i class='bx bx-filter'></i>
                                </div>
                                <table id="employeelist" class="table">
                                    <thead>
                                        <tr class="">
                                            <th scope="col">Employee Code</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Job</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Manager</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employee as $emp)
                                            <tr id="{{ $emp->id }}">
                                                <td>{{ $emp->employee_code }}</td>
                                                <td>{{ $emp->first_name }} {{ $emp->last_name }}</td>
                                                <td>{{ $emp->job->job_name ?? 'NA' }}</td>
                                                <td>{{ $emp->department->department_name }}</td>
                                                <td>{{ $emp->manager }}
                                                </td>
                                                <td>
                                                    <a href="/editEmployee/{{ $emp->id }}"
                                                        class="btn btn-sm btn-success"><i class="fa-solid fa-user-pen">
                                                            Edit</i></a>
                                                    <a data-del="{{ $emp->id }}"
                                                        class="btn btn-sm btn-danger btnDeleteEmp"><i
                                                            class="fa-solid fa-delete-left"> Delete</i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile">
                            <div class="order">
                                <div class="head">
                                    <button type="button" class="addnewEmpButton" data-bs-toggle="modal"
                                        data-bs-target="#newJob">
                                        <span>
                                            <i class='bx bxs-plus-circle'></i>
                                            Add New Job
                                        </span>
                                    </button>
                                    <i class='bx bx-search'></i>
                                    <i class='bx bx-filter'></i>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Job Name</th>
                                            <th>Description</th>
                                            <th>Rate</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($job as $job)
                                            <tr>
                                                <td>{{ $job->job_name }}</td>
                                                <td>{{ $job->description }}</td>
                                                <td>{{ $job->rate }}</td>
                                                <td><a data-id="{{ $job->id }}"
                                                        class="btn btn-sm btn-success btnEditJob"><i
                                                            class="fa-solid fa-user-pen"></i></a>

                                                    <a data-del="{{ $job->id }}"
                                                        class="btn btn-sm btn-danger btnDeleteJob"><i
                                                            class="fa-solid fa-delete-left"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages">
                            <div class="order">
                                <div class="head">
                                    <button type="button" class="addnewEmpButton" data-bs-toggle="modal"
                                        data-bs-target="#newDepartment">
                                        <span>
                                            <i class='bx bxs-plus-circle'></i>
                                            Add New Department
                                        </span>
                                    </button>
                                    <i class='bx bx-search'></i>
                                    <i class='bx bx-filter'></i>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($depart as $dep)
                                            <tr>
                                                <td>{{ $dep->department_name }}</td>
                                                <td>
                                                    <a data-id="{{ $dep->id }}"
                                                        class="btn btn-sm btn-success btnEditDepart"><i
                                                            class="fa-solid fa-user-pen"></i></a>
                                                    <a data-del="{{ $dep->id }}"
                                                        class="btn btn-sm btn-danger btnDeleteDepart"><i
                                                            class="fa-solid fa-delete-left"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <div class="order">
                                <div class="head">
                                    <button type="button" class="addnewEmpButton" data-bs-toggle="modal"
                                        data-bs-target="#newSchedule">
                                        <span>
                                            <i class='bx bxs-plus-circle'></i>
                                            Add New Schedule
                                        </span>
                                    </button>
                                    <i class='bx bx-search'></i>
                                    <i class='bx bx-filter'></i>
                                </div>
                                <table>
                                    <thead>

                                        <tr>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sched as $s)
                                            <tr>
                                                <td>{{ $s->time_in }}</td>
                                                <td>{{ $s->time_out }}</td>
                                                <td><a data-id="{{ $s->id }}"
                                                        class="btn btn-sm btn-success btnEditSched"><i
                                                            class="fa-solid fa-user-pen"></i></a>

                                                    <a data-del="{{ $s->id }}"
                                                        class="btn btn-sm btn-danger btnDeleteSched"><i
                                                            class="fa-solid fa-delete-left"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- DATA TABLE --}}
    <script>
        $(document).ready(function() {
            $('#employeeList').DataTable();
        });
    </script>
    {{-- DATA TABLE --}}

    {{-- TAB PANE SCRIPTS --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add active class on tab click
            $(".tab").on("click", function() {
                var categoryId = $(this).data("id");

                $(".tab, .tab-pane").removeClass("active");
                $(this).addClass("active");
                $("#" + categoryId).addClass("active");
            });
            $('tr').on('dblclick', function() {
                var empId = $(this).attr('id');
                //new code
                var url = "/profileEmployee";
                $.get(url + '/' + empId, function(data) {
                    $(".detail h5").html(data.first_name + '&nbsp' + data.last_name).change();
                    $(".detail p").html(data.job.job_name).change();
                    $(".phone p").html(data.contact_number).change();
                    $(".add p").html(data.address ? data.address : data.perma_address).change();
                    $(".bday p").html(data.birthdate).change();
                    $(".emails p").html(data.email).change();
                    $(".civil p").html(data.civil_status).change();
                    $(".gender p").html(data.gender).change();
                    $(".sched p").html(data.sched.time_in + ' - ' + data.sched.time_out)
                        .change();
                    $(".depart p").html(data.department.department_name).change();
                    $(".rate p").html('₱ ' + data.job.rate).change();
                    $(".sss p").html(data.sss ?? 'Not Set').change();
                    $(".tin p").html(data.tin ?? 'Not Set').change();
                    $(".pagibig p").html(data.pagibig ?? 'Not Set').change();
                    $(".philhealth p").html(data.philhealth ?? 'Not Set').change();
                    $('#profileModal').modal('show');
                })
                //new code
            });
        });
    </script>
    <script></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // EDIT scripts for modals
            $(document).on('click', '.btnEditEmp', function() {
                var empId = $(this).attr("data-id");
                var url = "/editEmployee";
                $.get(url + '/' + empId, function(data) {
                    //success data
                    $('#empId').val(data.id);
                    $('#empCode').val(data.employee_code);
                    $('#fName').val(data.first_name);
                    $('#lName').val(data.last_name);
                    $('#add').val(data.address);
                    $('#email').val(data.email);
                    $('#bday').val(data.birthdate);
                    $('#contact').val(data.contact_number);
                    $("div.genderSelect select").val(data.gender).change();
                    $("div.departSelect select").val(data.department_id).change();
                    $("div.jobSelect select").val(data.job_id).change();
                    $("div.schedSelect select").val(data.schedule_id).change();
                    $("div.managerSelect select").val(data.manager).change();
                    $('#EmployeeEditModal').modal('show');
                })
            });

            $(document).on('click', '.btnView', function() {

                var empId = $(this).attr("data-view");
                var pic = $(this).attr("data-pic");
                $("#pic").attr("src", pic);
                $.ajax({
                    method: "POST",
                    url: "",
                    data: {
                        'employee_id': empId,
                    },
                    success: function(response) {

                        $.each(response, function(key, emp) {
                            $(".detail h5").html(emp['firstname'] + '&nbsp' + emp[
                                'lastname']).change();
                            $(".detail p").html(emp['job_name']).change();
                            $(".phone p").html(emp['contact_info']).change();
                            $(".add p").html(emp['address']).change();
                            $(".bday p").html(emp['birthdate']).change();
                            $(".emails p").html(emp['email']).change();
                            $(".sched p").html(emp['time_in'] + ' - ' + emp['time_out'])
                                .change();
                            $(".depart p").html(emp['department_name']).change();
                            $(".rate p").html('Php ' + emp['rate']).change();

                            $('#profileModal').modal('show');
                        });
                    }
                });
            });

            $(document).on('click', '.btnEditJob', function() {
                var jobId = $(this).attr("data-id");
                var url = "/editJob";
                $.get(url + '/' + jobId, function(data) {
                    //success data
                    $('#jobId').val(data.id);
                    $('#jobName').val(data.job_name);
                    $('#rate').val(data.rate);
                    $("div.managerSelect select").val(data.manager).change();
                    $('#description').val(data.description);
                    $('#jobEditModal').modal('show');
                })
            });
            $(document).on('click', '.btnEditSched', function() {
                var schedId = $(this).attr("data-id");
                var url = "/editSchedule";
                $.get(url + '/' + schedId, function(data) {
                    //success data
                    $('#schedId').val(data.id);
                    $('#timeIn').val(data.time_in);
                    $('#timeOut').val(data.time_out);
                    $('#scheduleEditModal').modal('show');
                })
            });
            $(document).on('click', '.btnEditDepart', function() {
                var departId = $(this).attr("data-id");
                var url = "/editDepartment";
                $.get(url + '/' + departId, function(data) {
                    //success data
                    $('#departId').val(data.id);
                    $('#departName').val(data.department_name);
                    $('#departmentEditModal').modal('show');
                })
            });

            // DELETE scripts for modals
            $('.btnDeleteEmp').on('click', function() {

                const emp_id = $(this).attr("data-del");
                $('.empId').val(emp_id);
                $('#deleteEmployeeModal').modal('show');
            });
            $('.btnDeleteJob').on('click', function() {

                const job_id = $(this).attr("data-del");
                $('.jobId').val(job_id);
                $('#deleteJobModal').modal('show');
            });
            $('.btnDeleteSched').on('click', function() {

                const sched_id = $(this).attr("data-del");
                $('.schedId').val(sched_id);
                $('#deleteSchedModal').modal('show');
            });
            $('.btnDeleteDepart').on('click', function() {

                const depart_id = $(this).attr("data-del");
                $('.departId').val(depart_id);
                $('#deleteDepartmentModal').modal('show');
            });
        });
    </script>
@endsection
