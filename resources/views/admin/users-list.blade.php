@extends('templates.main')
@section('title', 'Admin Users List')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')
<!-- Users List Form/Table -->
<div class="container">
    <div class="wrapper-editor">
        <div class="block my-4">
            <p class="error"></p>
            <p class="success"></p>
            <h1 class="d-flex justify-content-center">Admin Users List</h1>
            <br>
            <div class="d-flex justify-content-center">
                <p class="h5 text-primary createShowP">0 row selected</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center modalWrapper">
            <!-- Add New User -->
            <div class="modal fade addNewInputs" id="modalAdd15" tabindex="-1" role="dialog" aria-labelledby="modalAdd15" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Add new form</h4>
                            <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Add Modal Form -->
                        <form id="addForm">
                            @csrf
                            <div class="modal-body mx-3">
                                <div class="md-form mb-5">
                                    <select id="addRole" name="role" class="form-control input-md" required>
                                        <option value="Guardian">Guardian</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="MaRe">Maison Relais</option>
                                    </select>
                                    <label class="active adminAddModal" for="addRole">Role</label>
                                </div>
                                <div class="md-form mt-5 mb-3">
                                    <input type="text" id="inputPosition15" name="first_name" class="form-control validate">
                                    <label for="inputPosition15">First Name</label>
                                </div>
                                <div class="md-form mt-5 mb-3">
                                    <input type="text" id="inputOfficeInput15" name="last_name" class="form-control validate">
                                    <label for="inputOfficeInput15">Last Name</label>
                                </div>
                                <div class="md-form mt-5 mb-3">
                                    <input type="date" id="inputDate" name="date_of_birth" class="form-control" placeholder="Select Date">
                                    <label for="inputDate15">Date of Birth</label>
                                </div>
                                <div class="md-form mt-5 mb-2">
                                    <div id="addItemsContainer"></div>
                                    <label class="active adminAddModal" for="addItemsContainer">Children/Class</label>
                                </div>
                                <p class="addChild" style="cursor: pointer" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add Child +</p>
                                <p class="addKlass" style="cursor: pointer; display: none" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add Class +</p>
                            </div>
                            <div class="modal-footer d-flex justify-content-center buttonAddFormWrapper">
                                <button name="addSubmit" class="btn peach-gradient btn-block btn-rounded z-depth-1a" data-dismiss="modal">Add form
                                    <i class="far fa-paper-plane ml-1"></i>
                                </button>
                            </div>
                        </form>
                        <!-- /Add Modal Form -->
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="" id="addOpenModal" class="btn btn-info btn-rounded btn-sm" data-toggle="modal" data-target="#modalAdd15">Add<i class="fas fa-plus-square ml-1"></i></a>
            </div>
            <!-- /Add New User -->
            <!-- Edit User -->
            <div class="modal fade modalEditClass" id="modalEdit15" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">Edit form</h4>
                            <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Edit Modal Form -->
                        <form id="editForm">
                            <div class="modal-body mx-3 modal-inputs">
                                <div class="md-form mb-3">
                                    <input type="hidden">
                                    <select id="editRole" name="role" class="form-control input-md" required></select>
                                    <label class="active adminEditModal" for="editRole">Role</label>
                                </div>
                                <div class="md-form mt-5 mb-3">
                                    <input type="text" id="formNameEdit15" name="first_name" class="form-control validate">
                                    <label class="active" for="formNameEdit15">First Name</label>
                                </div>
                                <div class="md-form mt-5 mb-3">
                                    <input type="text" id="formPositionEdit15" name="last_name" class="form-control validate">
                                    <label class="active" for="formPositionEdit15">Last Name</label>
                                </div>
                                <div class="md-form mt-5 mb-3">
                                    <input type="date" id="formDateOfBirthEdit15" name="date_of_birth" class="form-control validate">
                                    <label class="active" for="formDateOfBirthEdit15">Date of Birth</label>
                                </div>
                                <div class="md-form mt-5 mb-2">
                                    <div id="editItemsContainer"></div>
                                    <label class="active adminEditModal" for="editItemsContainer">Children/Class</label>
                                </div>
                                <input type="hidden">
                                @csrf
                                <p class="addChild" style="cursor: pointer" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add Child +</p>
                                <p class="addKlass" style="cursor: pointer; display: none" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add Class +</p>
                            </div>
                            <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                                <button name="editSubmit" class="btn peach-gradient btn-block btn-rounded z-depth-1a" data-dismiss="modal">Edit form
                                    <i class="far fa-paper-plane ml-1"></i>
                                </button>
                            </div>
                        </form>
                        <!-- /Edit Modal Form -->
                    </div>
                </div>
            </div>
            <div class="text-center buttonEditWrapper">
                <button id="editOpenModal" class="btn btn-info btn-rounded btn-sm buttonEdit" data-toggle="modal" disabled data-target="#modalEdit15" disabled>Edit<i class="fas fa-pen-square ml-1"></i></a>
            </div>
            <!-- Edit User -->
            <!-- Delete User -->
            <div class="modal fade" id="modalDelete15" tabindex="-1" role="dialog" aria-labelledby="modalDelete15" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold ml-5 text-danger">Delete</h4>
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Delete Modal Form -->
                        <form id="deleteForm">
                            @csrf
                            <div class="modal-body mx-3">
                                <p class="text-center h4">Are you sure to delete selected row?</p>
                            </div>
                            <div class="modal-footer d-flex justify-content-center deleteButtonsWrapper">
                                <button name="deleteSubmit" type="button" class="btn btn-outline-danger btn-rounded btnYesClass" id="btnYes15" data-dismiss="modal">Yes
                                    <i class="far fa-paper-plane ml-1"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-rounded btnNoClass" id="btnNo15" data-dismiss="modal">No
                                    <i class="far fa-paper-plane ml-1"></i>
                                </button>
                            </div>
                        </form>
                        <!-- /Delete Modal Form -->
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button id="deleteOpenModal" class="btn btn-danger btn-sm btn-rounded buttonDelete" data-toggle="modal" disabled data-target="#modalDelete15" disabled>Delete<i class="fas fa-times ml-1"></i></a>
            </div>
        </div>
        <!-- /Delete User -->
        <!-- Users List -->
        <table id="dt-less-columns" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Role</th>
                    <th class="th-sm">First Name</th>
                    <th class="th-sm">Last Name</th>
                    <th class="th-sm">Username</th>
                    <th class="th-sm">Age</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->username }}</td>
                        <td><?php echo DateTime::createFromFormat('Y-m-d', $user->date_of_birth)->diff(new DateTime('now'))->y;?> yrs</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Role</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Age</th>
                </tr>
            </tfoot>
        </table>
        <!-- /Users List -->
    </div>
</div>
<!-- /Users List Form/Table -->

@endsection

@section('footer')
@include('templates.footer')
@endsection

@section('extra-scripts')
<script>
    $('#dt-less-columns').mdbEditor({
        modalEditor: true,
        rowEditor: true
    });
    $('.dataTables_length').addClass('bs-select');
    //Hide Edit button until User Row is Selected
    $('#editOpenModal').prop('disabled', true);
</script>
<script>
    const addItemsContainer = $("#addItemsContainer");
    const editItemsContainer = $("#editItemsContainer");
    let myUser;
    let previousRole;
    let counter;
    let usernameSelector;
    let ageSelector;
    let usernameText;
    let age;

    $('#addOpenModal').click(function(e) {
        counter = 0;
        addItemsContainer.html("");
        previousRole = $("#addRole").val();
        displayAddKlassOrChild(previousRole, "add");
    });

    $('#modalAdd15 #addRole').click(function(e) {
        roleSelector("add", this.value);
    });

    $('#modalEdit15 #editRole').click(function(e) {
        roleSelector("edit", this.value);
    });

    $('#modalAdd15 .addChild').click(function() {
        addChildItem(addItemsContainer, false, false);
    });

    $('#modalAdd15 .addKlass').click(function() {
        addKlassItem(addItemsContainer, false, false);
    });

    $('#modalEdit15 .addChild').click(function() {
        addChildItem(editItemsContainer, false, false);
    });

    $('#modalEdit15 .addKlass').click(function() {
        addKlassItem(editItemsContainer, false, false);
    });

    function displayAddKlassOrChild(role, method) {
        if (role == "Teacher") {
            showAddKlass(method);
        } else if (role == "Guardian" || role == "MaRe") {
            showAddChild(method);
        }
    }

    function roleSelector(method, role) {
        if (role == "Teacher") {
            showAddKlass(method);
            if (previousRole != "Teacher") {
                if (method == "add") {
                    addItemsContainer.html("");
                } else if (method == "edit") {
                    editItemsContainer.html("");
                }
                counter = 0;
                previousRole = role;
            }
        } else {
            showAddChild(method);
            if (previousRole != "Guardian" && previousRole != "MaRe") {
                if (method == "add") {
                    addItemsContainer.html("");
                } else if (method == "edit") {
                    editItemsContainer.html("");
                }
                counter = 0;
                previousRole = role;
            }
        }
    }

    function showAddChild(mode) {
        if (mode == "add") {
            $("#modalAdd15 .addKlass").css("display", "none");
            $("#modalAdd15 .addChild").css("display", "initial");
        } else if (mode == "edit") {
            $("#modalEdit15 .addKlass").css("display", "none");
            $("#modalEdit15 .addChild").css("display", "initial");
        }
    }

    function showAddKlass(mode) {
        if (mode == "add") {
            $("#modalAdd15 .addChild").css("display", "none");
            $("#modalAdd15 .addKlass").css("display", "initial");
        } else if (mode == "edit") {
            $("#modalEdit15 .addChild").css("display", "none");
            $("#modalEdit15 .addKlass").css("display", "initial");
        }

    }

    function addChildItem(container, user, studentId) {
        let div = $('<div></div>');
        let select = $('<select></select>');
        let button = $('<button></button>');
        let span = $('<span></span>');

        div.attr("class", "divFlex");
        select.attr("name", "child" + counter);
        select.attr("class", "form-control input-md");
        button.attr("type", "button");
        button.attr("class", "close text-primary");
        span.attr("aria-hidden", "true");
        span.html("&times;");
        button.click(function() {
            button.parent()[0].remove();
            renameItems(container);
        });

        if (!user) {
            @foreach($students as $student)
                select.append(new Option("{{ $student->first_name }} {{ $student->last_name }}", "{{ $student->id }}"));
            @endforeach
        } else {
            @foreach($students as $student)
                if (studentId === {{ $student->id }}) {
                    select.append(new Option("{{ $student->first_name }} {{ $student->last_name }}", "{{ $student->id }}", true, true));
                } else {
                    select.append(new Option("{{ $student->first_name }} {{ $student->last_name }}", "{{ $student->id }}"));
                }
            @endforeach
        }

        button.append(span);
        div.append(select);
        div.append(button);
        container.append(div);

        counter++;
    }

    function addKlassItem(container, user, klassId) {
        let div = $('<div></div>');
        let select = $('<select></select>');
        let button = $('<button></button>');
        let span = $('<span></span>');

        div.attr("class", "divFlex");
        select.attr("name", "klass" + counter);
        select.attr("class", "form-control input-md");
        button.attr("type", "button");
        button.attr("class", "close text-primary");
        span.attr("aria-hidden", "true");
        span.html("&times;");
        button.click(function() {
            button.parent()[0].remove();
            renameItems(container);
        });

        if (!user) {
            @foreach($klasses as $klass)
                select.append(new Option("{{ $klass->name }}", "{{ $klass->id }}"));
            @endforeach
        } else {
            @foreach($klasses as $klass)
                if (klassId === {{ $klass->id }}) {
                    select.append(new Option("{{ $klass->name }}", "{{ $klass->id }}", true, true));
                } else {
                    select.append(new Option("{{ $klass->name }}", "{{ $klass->id }}"));
                }
            @endforeach
        }

        button.append(span);
        div.append(select);
        div.append(button);
        container.append(div);

        counter++;
    }

    function fillRoles(user) {
        let roles = {'Guardian': 'Guardian', 'Teacher': 'Teacher', 'MaRe': 'Maison Relais'};
        let select = $('#editRole');
        select.html("");

        for (const key in roles) {
            if (user.role == key) {
                select.append(new Option(roles[key], key, true, true));
            } else {
                select.append(new Option(roles[key], key));
            }
        }
    }

    function fillChilds(user, childs) {
        for (const child of childs) {
            addChildItem(editItemsContainer, user, child.student_id);
        }
    }

    function fillKlasses(user, klasses) {
        for (const klass of klasses) {
            addKlassItem(editItemsContainer, user, klass.klass_id);
        }
    }

    function renameItems(container) {
        counter = 0;
        let selects = $("#" + container[0].id + " select");
        for (const select of selects) {
            $(select).attr("name", select["name"].slice(0, -1) + counter);
            counter++;
        }
    }
</script>
<script>
    $(function(){
        $('button[name="addSubmit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/users',
                type: 'post',
                data: $('#addForm').serialize(),
                success: function(result){
                    $('#inputPosition15').val("");
                    $('#inputOfficeInput15').val("");
                    $('#inputDate').val("");
                    $('.success').text("User added successfully");
                },
                error: function(err){
                    $('.error').text("Something went wrong");
                }
            });
        });
    });
</script>
<script>
    $(function(){
        $('button[name="editSubmit"]').click(function(e){
            age = Math.floor((new Date() - new Date($('#formDateOfBirthEdit15').val())) / (365.25 * 24 * 60 * 60 * 1000));

            e.preventDefault();
            $.ajax({
                url: '/users/' + myUser.id,
                type: 'put',
                data: $('#editForm').serialize(),
                success: function(result){
                    usernameSelector.text(usernameText);
                    ageSelector.text(age + ' yrs');
                    $('.success').text("User edited successfully");
                },
                error: function(err){
                    $('.error').text("Something went wrong");
                }
            });
        });
    });
</script>
<script>
    $(function(){
        $('button[name="deleteSubmit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/users/' + myUser.id,
                type: 'delete',
                data: $('#deleteForm').serialize(),
                success: function(result){
                    $('.success').text("User deleted successfully");
                },
                error: function(err){
                    $('.error').text("Something went wrong");
                }
            });
        });
    });
</script>
<script>
    $(function(){
        $('#editOpenModal').click(function(e){
            $('#editForm label').addClass('active');
            counter = 0;
            usernameSelector = $('#dt-less-columns .tr-color-selected td').eq(3);
            ageSelector = $('#dt-less-columns .tr-color-selected td').eq(4);

            usernameText = usernameSelector.text();

            e.preventDefault();
            $.ajax({
                url: "/users/" + usernameText + "/edit",
                type: 'get',
                success: function(result){
                    myUser = result[0];
                    items = result[1];
                    fillRoles(myUser);

                    $('#modalEdit15 input[name="date_of_birth"]').val(myUser.date_of_birth);

                    editItemsContainer.html("");
                    if (myUser.role == "Teacher") {
                        fillKlasses(myUser, items);
                    } else {
                        fillChilds(myUser, items);
                    }

                    previousRole = $("#editRole").val();
                    displayAddKlassOrChild(previousRole, "edit");
                },
                error: function(err){
                    $('.error').text("Something went wrong");
                }
            });
        });
    });
</script>
<script>
    $(function(){
        $('#deleteOpenModal').click(function(e){
            usernameSelector = $('#dt-less-columns .tr-color-selected td').eq(3);
            usernameText = usernameSelector.text();

            e.preventDefault();
            $.ajax({
                url: "/users/" + usernameText + "/edit",
                type: 'get',
                success: function(result){
                    myUser = result[0];
                },
                error: function(err){
                    $('.error').text("Something went wrong");
                }
            });
        });
    });
</script>
@endsection
