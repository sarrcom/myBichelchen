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
                            <div class="modal-body mx-3 modal-add-inputs" id="foo">
                                <div class="md-form mb-5">
                                    <select id="role" name="role" class="form-control input-md" required>
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
                            </div>
                            <div class="modal-footer d-flex justify-content-center buttonAddFormWrapper">
                                <button class="btn peach-gradient btn-block btn-rounded z-depth-1a" data-dismiss="modal">Add form
                                    <i class="far fa-paper-plane ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="" class="btn btn-info btn-rounded btn-sm" data-toggle="modal" data-target="#modalAdd15">Add<i
                class="fas fa-plus-square ml-1"></i></a>
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
                            <div class="modal-body mx-3 modal-inputs">
                                <div class="md-form mb-5">
                                    <input type="text" id="formNameEdit15" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="formNameEdit15">Name</label>
                                </div>
                                <div class="md-form mb-5">
                                    <input type="text" id="formPositionEdit15" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="formPositionEdit15">Position</label>
                                </div>
                                <div class="md-form mb-5">
                                    <input type="text" id="formOfficeEdit15" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="formOfficeEdit15">Office</label>
                                </div>
                                <div class="md-form mb-5">
                                    <input type="text" id="formAgeEdit15" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="formAgeEdit15">Age</label>
                                </div>
                                <div class="md-form mb-5">
                                    <input type="text" id="formDateEdit" class="form-control datepicker">
                                    <label data-error="wrong" data-success="right" for="formDateEdit15">Date</label>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center editInsideWrapper">
                                <button class="btn peach-gradient btn-block btn-rounded z-depth-1a" data-dismiss="modal">Edit form
                                    <i class="far fa-paper-plane ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center buttonEditWrapper">
                    <button class="btn btn-info btn-rounded btn-sm buttonEdit" data-toggle="modal" data-target="#modalEdit15" disabled>Edit<i class="fas fa-pen-square ml-1"></i></a>
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
@section('extra-scripts')
<script>
    $('#your-table-id').mdbEditor({
        headerLength: 6,
        evenTextColor: '#000',
        oddTextColor: '#000',
        bgEvenColor: '',
        bgOddColor: '',
        thText: '',
        thBg: '',
        modalEditor: false,
        bubbleEditor: false,
        contentEditor: false,
        rowEditor: false
    });
</script>
<script>
    $('#dtBasicExample, #dtBasicExample-1, #dt-more-columns, #dt-less-columns').mdbEditor({
      modalEditor: true
    });
    $('.dataTables_length').addClass('bs-select');
</script>
<script>
    const addForm = $('#foo');
    let i = 0;

    function addItem(done, task) {
        let select = $('<select></select>');
        let option = $('<option></option>');
        let checkbox = $('<input type="checkbox">');
        let span = $('<span></span>');

        select.attr("name", "child" + i);
        select.attr("class", "form-control input-md");
        span.text(task);

        if (done) {
            checkbox.prop("checked", true);
            myDoneList.append(li.append(checkbox).append(label).append(span));
        } else {
            myTodoList.append(li.append(checkbox).append(label).append(span));
        }

        checkbox.click(checkClicking);
        i++;
    }

    $('#modalAdd15 option').click(function(e) {
        if (this.value == "Teacher") {
            console.log(this.value);
        } else {
            console.log('ssdsdsds');
        }
    })
</script>
@endsection
