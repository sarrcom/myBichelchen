@extends('templates.main')
@section('title', 'Admin Users List')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')

    <div class="container">
        <div class="wrapper-editor">
            <div class="block my-4">
                <div class="d-flex justify-content-center">
                    <p class="h5 text-primary createShowP">0 row selected</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center modalWrapper">
                <div class="modal fade addNewInputs" id="modalAdd15" tabindex="-1" role="dialog" aria-labelledby="modalAdd15" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Add new form</h4>
                                <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" id="addForm">
                                @csrf
                                @method('POST')
                                <div class="modal-body mx-3 modal-add-inputs">
                                    <div class="md-form mb-5">
                                        <select id="addRole" name="role" class="form-control input-md" required>
                                            <option value="Guardian">Guardian</option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="MaRe">Maison Relais</option>
                                        </select>
                                    </div>
                                    <div class="md-form mb-5">
                                        <input type="text" id="inputPosition15" name="first_name" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="inputPosition15">First Name</label>
                                    </div>
                                    <div class="md-form mb-5">
                                        <input type="text" id="inputOfficeInput15" name="last_name" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="inputOfficeInput15">Last Name</label>
                                    </div>
                                    <div class="md-form mb-5">
                                        <input type="date" id="inputDate" name="date_of_birth" class="form-control" placeholder="Select Date">
                                        <label data-error="wrong" data-success="right" for="inputDate15">Date of Birth</label>
                                    </div>
                                    <div id="addItemsContainer"></div>
                                    <p id="addChild" style="cursor: pointer" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add child</p>
                                    <p id="addKlass" style="cursor: pointer; display: none" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add class</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center buttonAddFormWrapper">
                                    <button name="addSubmit" class="btn peach-gradient btn-block btn-rounded z-depth-1a" data-dismiss="modal">Add form
                                        <i class="far fa-paper-plane ml-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="" class="btn btn-info btn-rounded btn-sm" data-toggle="modal" data-target="#modalAdd15">Add<i class="fas fa-plus-square ml-1"></i></a>
                </div>
                <div class="modal fade modalEditClass" id="modalEdit15" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold text-secondary ml-5">Edit form</h4>
                                <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" id="editForm">
                                @csrf
                                @method('PUT')
                                <div class="modal-body mx-3 modal-inputs">
                                    <div class="md-form mb-5">
                                        <select id="editRole" name="role" class="form-control input-md" required></select>
                                    </div>
                                    <div class="md-form mb-5">
                                        <input type="text" id="formNameEdit15" name="first_name" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="formNameEdit15">First Name</label>
                                    </div>
                                    <div class="md-form mb-5">
                                        <input type="text" id="formPositionEdit15" name="last_name" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="formPositionEdit15">Last Name</label>
                                    </div>
                                    <div class="md-form mb-5">
                                        <input type="date" id="formOfficeEdit15" name="date_of_birth" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="formOfficeEdit15">Date of Birth</label>
                                    </div>
                                    <div id="editItemsContainer"></div>
                                    <p id="editChild" style="cursor: pointer" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add child</p>
                                    <p id="editKlass" style="cursor: pointer; display: none" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add class</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                                    <button class="btn peach-gradient btn-block btn-rounded z-depth-1a" data-dismiss="modal">Edit form
                                        <i class="far fa-paper-plane ml-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center buttonEditWrapper">
                    <button id="editButton" class="btn btn-info btn-rounded btn-sm buttonEdit" data-toggle="modal" data-target="#modalEdit15" disabled>Edit<i class="fas fa-pen-square ml-1"></i></a>
                </div>
                <div class="modal fade" id="modalDelete15" tabindex="-1" role="dialog" aria-labelledby="modalDelete15" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold ml-5 text-danger">Delete</h4>
                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">
                                <p class="text-center h4">Are you sure to delete selected row?</p>
                            </div>
                            <div class="modal-footer d-flex justify-content-center deleteButtonsWrapper">
                                <button type="button" class="btn btn-outline-danger btn-rounded btnYesClass" id="btnYes15" data-dismiss="modal">Yes
                                    <i class="far fa-paper-plane ml-1"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-rounded btnNoClass" id="btnNo15" data-dismiss="modal">No
                                    <i class="far fa-paper-plane ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-danger btn-sm btn-rounded buttonDelete" data-toggle="modal" disabled data-target="#modalDelete15" disabled>Delete<i class="fas fa-times ml-1"></i></a>
                </div>
            </div>
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
        </div>
    </div>
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
</script>
<script>
    const addItemsContainer = $("#addItemsContainer");
    const editItemsContainer = $("#editItemsContainer")

    let previousRole = $("#addRole").val();
    let co = 0;
    let ko = 0;

    if (previousRole == "Teacher") {
        showAddKlass();
    } else {
        showAddChild();
    }

    $('#modalAdd15 #addRole option').click(function(e) {
        roleSelector("add");
    });

    $('#modalEdit15 #editRole option').click(function(e) {
        roleSelector("edit");
    });

    function roleSelector(method) {
        let newRole = this.value;
        console.log(newRole);

        if (newRole == "Teacher") {
            showAddKlass(method);
            if (previousRole != "Teacher") {
                if (method == "add") {
                    addItemsContainer.html("");
                } else if (method == "edit") {
                    editItemsContainer.html("");
                }
                co = 0;
                previousRole = newRole;
            }
        } else {
            showAddChild(method);
            if (previousRole != "Guardian" && previousRole != "MaRe") {
                if (method == "add") {
                    addItemsContainer.html("");
                } else if (method == "edit") {
                    editItemsContainer.html("");
                }
                ko = 0;
                previousRole = newRole;
            }
        }
    }

    function showAddChild(mode) {
        if (mode == "add") {
            $("#addKlass").css("display", "none");
            $("#addChild").css("display", "initial");
        } else if (mode == "edit") {
            $("#editKlass").css("display", "none");
            $("#editChild").css("display", "initial");
        }
    }

    function showAddKlass(mode) {
        if (mode == "add") {
            $("#addChild").css("display", "none");
            $("#addKlass").css("display", "initial");
        } else if (mode == "edit") {
            $("#editChild").css("display", "none");
            $("#editKlass").css("display", "initial");
        }

    }

    $('#addChild').click(function() {
        addChildItem(addItemsContainer, false, false);
    });
    $('#addKlass').click(function() {
        addKlassItem(addItemsContainer, false, false);
    });

    function addChildItem(container, user) {
        let select = $('<select></select>');

        select.attr("name", "child" + co);
        select.attr("class", "form-control input-md");

        @foreach($students as $student)
            select.append(new Option("{{ $student->first_name }} {{ $student->last_name }}", "{{ $student->id }}"));
        @endforeach

        container.append(select);

        co++;
    }

    function addKlassItem(container, user, klassId) {
        let select = $('<select></select>');

        select.attr("name", "klass" + ko);
        select.attr("class", "form-control input-md");

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

        container.append(select);

        ko++;
    }

    function fillRoles(user) {
        var roles = {'Guardian': 'Guardian', 'Teacher': 'Teacher', 'MaRe': 'Maison Relais'};
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

    function fillChilds(user) {
        @foreach($teachersKlasses as $teacherKlass)
            if ({{ $teacherKlass->user_id }} === user.id) {
                addKlassItem(editItemsContainer, user, {{ $teacherKlass->klass_id }});
            }
        @endforeach
    }

    function fillKlasses(user) {
        @foreach($teachersKlasses as $teacherKlass)
            if ({{ $teacherKlass->user_id }} === user.id) {
                addKlassItem(editItemsContainer, user, {{ $teacherKlass->klass_id }});
            }
        @endforeach
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
                    console.log(result);
                    /*if (result === 'Login') {
                        window.location.replace('/users');
                    } else {
                        $('#errorMessage').html(result);
                    }*/
                },
                error: function(err){
                    console.log('Oh boi')
                }
            });
        });
    });
</script>
<script>
    $(function(){
        $('#editButton').click(function(e){
            let username = $('#dt-less-columns .tr-color-selected td').eq(3).text();

            e.preventDefault();
            $.ajax({
                url: "/users/" + username + "/edit",
                type: 'get',
                success: function(result){
                    fillRoles(result);

                    $('#modalEdit15 input[name="first_name"]').val(result.first_name);
                    $('#modalEdit15 input[name="last_name"]').val(result.last_name);
                    $('#modalEdit15 input[name="date_of_birth"]').val(result.date_of_birth);

                    editItemsContainer.html("");
                    if (result.role == "Teacher") {
                        fillKlasses(result);
                    } else {
                        fillChilds(result);
                    }
                },
                error: function(err){
                    console.log('Oh boi');
                }
            });
        });
    });
</script>
@endsection
