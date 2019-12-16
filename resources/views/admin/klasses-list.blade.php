@extends('templates.main')
@section('title', 'Admin Classes List')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')
<!-- Classes List Form/Table -->
<div class="container">
    <div class="wrapper-editor">
        <div class="block my-4">
            <h1 class="d-flex justify-content-center">Admin Classes List</h1>
            <br>
            <div class="d-flex justify-content-center">
                <p class="h5 text-primary createShowP">0 row selected</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center modalWrapper">
        <!-- Add New Class -->
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
                                    <select id="addGrade" name="grade" class="form-control input-md" required>
                                        @for ($i = 1; $i <= 6; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <label class="active" data-error="wrong" data-success="right" for="addGrade">Class</label>
                                </div>
                                <div class="md-form mb-5">
                                    <input type="text" id="inputPosition15" name="name" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="inputPosition15">Name</label>
                                </div>
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
            <!-- /Add New Class -->
            <!-- Edit Class -->
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
                                <div class="md-form mb-5">
                                    <select id="editGrade" name="grade" class="form-control input-md" required></select>
                                    <label class="active" data-error="wrong" data-success="right" for="editGrade">Class</label>
                                </div>
                                <div class="md-form mb-5">
                                    <input type="text" id="formNameEdit15" name="name" class="form-control validate">
                                    <label class="active" data-error="wrong" data-success="right" for="formNameEdit15">Name</label>
                                </div>
                                <input type="hidden">
                                <input type="hidden">
                                @csrf
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
            <!-- Edit Class -->
            <!-- Delete Class -->
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
        <!-- /Delete Class -->
        <!-- Classes List -->
        <table id="dt-less-columns" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Grade</th>
                    <th style="display: none" class="th-sm">Id</th>
                </tr>
            </thead>
            <tbody>
                @foreach($klasses as $klass)
                    <tr>
                        <td>{{ $klass->name }}</td>
                        <td>{{ $klass->grade }}</td>
                        <td style="display: none">{{ $klass->id }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Grade</th>
                </tr>
            </tfoot>
        </table>
        <!-- /Classes List -->
    </div>
</div>
<!-- /Classes List Form/Table -->
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
    //Hide Edit button until Class Row is Selected
    $('tbody').click(function(e) {
        e.preventDefault();
        $('#editOpenModal').css('display', 'block');
    });
</script>
<script>
    let myKlass;
    let idSelector;
    let id;

    function fillGrades(klass) {
        $('#editGrade').html("");
        for (let i = 1; i <= 6; i++) {
            if (klass.grade == i) {
                $('#editGrade').append(new Option(i, i, true, true));
            } else {
                $('#editGrade').append(new Option(i, i));
            }
        }
    }
</script>
<script>
    $(function(){
        $('button[name="addSubmit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/klasses',
                type: 'post',
                data: $('#addForm').serialize(),
                success: function(result){
                    console.log("success");
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
        $('button[name="editSubmit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/klasses/' + myKlass.id,
                type: 'put',
                data: $('#editForm').serialize(),
                success: function(result){
                    console.log("success");
                },
                error: function(err){
                    console.log('Oh boi');
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
                url: '/klasses/' + myKlass.id,
                type: 'delete',
                data: $('#deleteForm').serialize(),
                success: function(result){
                    console.log("success");
                },
                error: function(err){
                    console.log('Oh boi');
                }
            });
        });
    });
</script>
<script>
    $(function(){
        $('#editOpenModal').click(function(e){
            $('#editForm label').addClass('active');
            idSelector = $('#dt-less-columns .tr-color-selected td').eq(2);
            id = idSelector.text();

            e.preventDefault();
            $.ajax({
                url: "/klasses/" + id + "/edit",
                type: 'get',
                success: function(result){
                    myKlass = result;
                    fillGrades(myKlass);
                },
                error: function(err){
                    console.log('Oh boi');
                }
            });
        });
    });
</script>
<script>
    $(function(){
        $('#deleteOpenModal').click(function(e){
            idSelector = $('#dt-less-columns .tr-color-selected td').eq(2);
            id = idSelector.text();

            e.preventDefault();
            $.ajax({
                url: "/klasses/" + id + "/edit",
                type: 'get',
                success: function(result){
                    myKlass = result;
                },
                error: function(err){
                    console.log('Oh boi');
                }
            });
        });
    });
</script>
@endsection
