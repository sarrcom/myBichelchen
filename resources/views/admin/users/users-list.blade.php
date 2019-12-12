@php
    ($roles = [
        'Guardian' => 'Guardian',
        'Teacher' => 'Teacher',
        'MaRe' => 'Maison Relais'
    ]);
@endphp

@extends('templates.main')
@section('title', 'Admin')

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
                                    <div id="editItemsContainer">
                                        @if($user->role ?? '' == "Teacher")
                                            @foreach($teachersKlasses as $teacherKlass)
                                                @if($teacherKlass->user_id === $user->id ?? '')
                                                    <select name="role" class="form-control input-md" required>
                                                        @foreach($klasses as $klass)
                                                            @if($teacherKlass->klass_id === $klass->id)
                                                                <option value="{{ $klass->id }}" selected>{{ $klass->name }}</option>
                                                            @else
                                                                <option value="{{ $klass->id }}">{{ $klass->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($responsibleStudents as $responsibleStudent)
                                                @if($responsibleStudent->user_id ?? '' === $user->id ?? '')
                                                    <select name="role" class="form-control input-md" required>
                                                        @foreach($students as $student)
                                                            @if($responsibleStudent->student_id === $student->id)
                                                                <option value="{{ $student->id }}" selected>{{ $student->first_name }} {{ $student->last_name }}</option>
                                                            @else
                                                                <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <p id="addChild" style="cursor: pointer" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add child</p>
                                    <p id="addKlass" style="cursor: pointer; display: none" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add class</p>
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
                                <button type="button" class="btn btn-outline-danger btnYesClass" id="btnYes15" data-dismiss="modal">Yes
                                    <i class="far fa-paper-plane ml-1"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btnNoClass" id="btnNo15" data-dismiss="modal">No
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
    let previousRole = $("#addRole").val();
    let co = 0;
    let ko = 0;

    if (previousRole == "Teacher") {
        showAddKlass();
    } else {
        showAddChild();
    }

    $('#modalAdd15 option').click(function(e) {
        let newRole = this.value;

        if (newRole == "Teacher") {
            showAddKlass();
            if (previousRole != "Teacher") {
                addItemsContainer.html("");
                co = 0;
                previousRole = newRole;
            }
        } else {
            showAddChild();
            if (previousRole != "Guardian" && previousRole != "MaRe") {
                addItemsContainer.html("");
                ko = 0;
                previousRole = newRole;
            }
        }
    });

    function showAddChild() {
        $("#addKlass").css("display", "none");
        $("#addChild").css("display", "initial");
    }

    function showAddKlass() {
        $("#addChild").css("display", "none");
        $("#addKlass").css("display", "initial");
    }

    $('#addChild').click(addChildItem);
    $('#addKlass').click(addKlassItem);

    function addChildItem() {
        let select = $('<select></select>');

        select.attr("name", "child" + co);
        select.attr("class", "form-control input-md");

        @foreach($students as $student)
            select.append(new Option("{{ $student->first_name }} {{ $student->last_name }}", "{{ $student->id }}"));
        @endforeach

        addItemsContainer.append(select);

        co++;
    }

    function addKlassItem() {
        let select = $('<select></select>');

        select.attr("name", "klass" + ko);
        select.attr("class", "form-control input-md");

        @foreach($klasses as $klass)
            select.append(new Option("{{ $klass->name }}", "{{ $klass->id }}"));
        @endforeach

        addItemsContainer.append(select);

        ko++;
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
                    let select = $('#editRole');
                    console.log(role);

                    select.html("");

                    @foreach($roles as $key => $role)
                        @if(result->role == $key)
                            select.append(new Option("{{ $role }}", "{{ $key }}", true));
                        @else
                            select.append(new Option("{{ $role }}", "{{ $key }}"));
                        @endif
                    @endforeach
                },
                error: function(err){
                    console.log('Oh boi');
                }
            });
        });
    });
</script>
@endsection
