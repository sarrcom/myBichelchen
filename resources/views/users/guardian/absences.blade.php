@extends('templates.main')
@section('title', 'Guardian Absences')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')
<h1 class="d-flex justify-content-center">Absences</h1>
<div class="d-flex justify-content-center">
    <p class="h5 text-primary createShowP">{{date("l")}}, {{date("d/m/Y")}}</p>
    <br><br><br>
</div>
<div class="container">
    <div class="card deep-blue-gradient chat-room">
        <div class="card-body">
            <!-- Messages List -->
            <!-- Grid row -->
            <div class="row px-lg-2 px-2">
                <!-- Grid column -->
                <div class="col-md-6 col-xl-4 px-0">
                    <h6 class="font-weight-bold mb-3 text-center text-lg-left">Absences</h6>
                    <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 scrollbar-light-blue">
                        <!-- All Messages -->
                        <ul id="allMessages" class="list-unstyled friend-list">
                            <!-- Inbox Box active grey -->
                          

                            <!-- /Inbox Box -->
                        </ul>
                        <!-- /All Messages -->
                    </div>
                </div>
                <!-- Grid column -->
                <!-- /Messages List -->
                <!-- Selected Message -->
                <!-- Grid column -->
                <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">
                    
                    <!-- Send Message -->
                    <form id="sendAbsencesForm">
                        @csrf
                        <div class="chat-body white p-3 z-depth-1">
                           
                            {{-- options from script based on the radio: classes or students--}}
                            <input type="text" id="subject" name="subject" required><br>
                            <div class="form-group basic-textarea">
                                <textarea name="description" class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..." required></textarea>
                            </div>

                            <label for="sickDate">Sick on</label>
                            <input type="date" id="sickDate" name="dueDate">
                        </div>

                        <button type="submit" class="btn btn-blue btn-rounded btn-sm waves-effect waves-light float-right" name="submitHomework">Send</button>
                    </form>
                </div>
                <!-- Grid column -->
                <!-- Selected Message -->
            </div>
        <!-- Grid row -->
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('templates.footer')
@endsection

@section('extra-scripts')
<script>
   $(function(){
        $('button[type="submit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/user/absences',
                type: 'post',
                data: $('#sendAbsencesForm').serialize(),
                success: function(result){
                    console.log(result);
                    if (result === 'submitted'){
                        $('#exampleFormControlTextarea2').val('');
                        $('#subject').val('');
                        $('#sickDate').val('');
                        fillList();
                    }
                },
                error: function(err){
                    console.log(err)
                }
            });
        });
    });

    fillList();
    function fillList(id = {{$item}}){
        $.ajax({
            url: '/user/absences/'+id,
            type: 'get',
                success: function(result){
                console.log(result);
                let listItem;
                let content;
                $('#allMessages').html('');
                for(message of result){
                    content = message.subject;
                    listItem = $('<li></li>');
                    listItem.text(content);

                $('#allMessages').append(listItem);
                }
            },
            error: function(err){
                console.log(err)
            }
        });
    }
</script>
@endsection