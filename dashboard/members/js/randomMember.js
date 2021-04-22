
$( document ).ready(function (){

    $('#random-male, #random-female, #random-member').on('click', function (e){
        let $sex = $(this).attr('name');
        e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'members/members_controller.php',
                data: {sex: $sex},
                success: function(data) {
                    var $data = JSON.parse(data);
                    alert('Náhodný člen: ' + $data['member']);
                },
                error: function() {
                    console.log('There was some error performing the AJAX call!');
                }
            });

    });

})
