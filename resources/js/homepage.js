import $, { data } from "jquery";

$(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    let base = 
    $('#rfid').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
         {
           //dapatkan nilai dari field tersebut
            let rfid = $('#rfid').val()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

           //kirim ke API
           $.ajax({
                method:"post",
                url:"api/absen",
                data: {
                    rfid: rfid
                }
           }).done(function(res){
                if(res.error){
                    alert(res.message)
                }else{
                    alert("Absen sudah masuk dalam rekap")
                }
           })
         }
       });  
});