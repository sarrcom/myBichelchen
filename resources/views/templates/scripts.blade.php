<!--  SCRIPTS  -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('MDB/js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('MDB/js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('MDB/js/bootstrap.min.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('MDB/js/mdb.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('MDB/js/addons/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('MDB/js/addons/mdb-editor.js') }}"></script>
<script>
    new WOW().init();
</script>
<script>
    let myId;
    @if($userLogged = session()->get('loggedUser'))
        @if($userLogged->role == 'Teacher')
            $(function(){
                $('.dropdown-item').click(function(e){
                    myId = $(this).prop('id').substr(1);

                    @php Cookie::queue('item', myId, 60 * 24 * 7); @endphp
                    e.preventDefault();
                    $.ajax({
                        url: @php url()->current() @endphp,
                        type: 'get',
                        success: function(result){
                            console.log("success");
                        },
                        error: function(err){
                            console.log("error");
                        }
                    });
                });
            });
        @elseif($userLogged->role == 'Guardian' || $userLogged->role == 'MaRe')

        @endif
    @endif
</script>
