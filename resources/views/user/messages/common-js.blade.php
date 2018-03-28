<script type="text/javascript">
// Starred star click.
$(".starred").on("click", function(e){
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    var starredStatus = "";
    var message_id = $(this).attr("data-id"); // get clicked message id.

    if ( $(this).hasClass("fa fa-star-o starred") )
    {
        $(this).removeClass();
        $(this).addClass("fa fa-star text-warning starred");
        starredStatus = 1;
    } else {
        $(this).removeClass();
        $(this).addClass("fa fa-star-o starred");
        starredStatus = 0;
    }
    // ajax request to mark message as starred.
    $.ajax({
       type:'POST',
       url:  '{{url('/message/starred')}}',
       async:false,
       data:{ message:message_id ,starred:starredStatus},
       success:function(data){

       }
    });
});

// Starred checkboxes.
$(".starred-btn").on("click", function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    var selected = new Array();

    $("input:checkbox[name=inbox]:checked").each(function(){

        // show / hide stars.
        if ( $("[data-id="+$(this).val()+"]").hasClass("fa fa-star-o starred") )
        {
            $("[data-id="+$(this).val()+"]").removeClass();
            $("[data-id="+$(this).val()+"]").addClass("fa fa-star text-warning starred");
            starredStatus = 1;

             // add checked boxes in array of selected.
            selected.push($(this).val());

        } else {
            // $("[data-id="+$(this).val()+"]").removeClass();
            // $("[data-id="+$(this).val()+"]").addClass("fa fa-star-o starred");
            starredStatus = 0;
        }

    });

    if (selected.length == 0 )
    {
        alert("select any message or messages marked as starred");
    }

    // Ajax request to starred checkboxes message.
    $.ajax({
       type:'POST',
       url:  '{{url('/message/btnStarred')}}',
       async:false,
       data:{ starredMessages: selected},
       success:function(data){

       }
    });


    console.log(  selected );
});

// delete button checkbox list.
$("#delete").on("click", function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    var selected = new Array();

    $("input:checkbox[name=inbox]:checked").each(function(){
        selected.push($(this).val());

        $("#id_"+$(this).val()).closest("tr").remove();

    });

    if (selected.length == 0 )
    {
        alert("Please select any message to delete.");
    }

    $.ajax({
       type:'POST',
       url:  '{{url('/message/btnDelete')}}',
       async:false,
       data:{ deleteMessages: selected},
       success:function(data){

       }
    });


    console.log(  selected );
});


// Mark as read.
$("#markRead").on("click", function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    var selected = new Array();

    $("input:checkbox[name=inbox]:checked").each(function(){
        selected.push($(this).val());

        $("#id_"+$(this).val()).closest("tr").removeClass("unread");

    });

    if (selected.length == 0 )
    {
        alert("Select any message to mark as read.");
    }

    // Ajax request to mark message as read.
    $.ajax({
       type:'POST',
       url:  '{{url('/message/isRead')}}',
       async:false,
       data:{ messages: selected},
       success:function(data){

       }
    });


    console.log(  selected );
});





// drop down options
jQuery(document).ready(function($){
    $('[data-toggle="tooltip"]').tooltip();
});
jQuery(document).ready(function(){
    jQuery(".btn-click").click(function(){
        jQuery("#filedd").toggle();
    });
});

if ( document.getElementById("sendForm") ) {
    var form = document.getElementById("sendForm");
    document.getElementById("send").addEventListener("click", function () {
        form.submit();
    });
}

</script>