@extends('templates.main')
@section('title', 'Teacher Absences')

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